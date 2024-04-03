<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $exams = Exam::query();
        $request->flash();

        if ($request->filled('title')) {
            $title = $request->input('title');
            $exams->where('title', 'like', "%$title%");
        }

        if ($request->filled('type')) {
            $type = $request->input('type');
            $exams->where('type', $type);
        }

        $exams = $exams->get();
        return view('admin.exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataExam = $request->only(['title', 'type', 'started_at', 'ended_at', 'score_per_question', 'duration', 'total_question']);
        $exam = Exam::create($dataExam);
        $dataQuestionImages = $request->file('question_images');
        foreach ($dataQuestionImages as $key => $image) {
            $dataRightAnswers = $request->input('right_answers_' . $key + 1);
            $fileName = $exam->id . '_' . 'question_' . $key + 1 . '.' . $image->extension();
            $filePath = '/storage/' . $image->storeAs('questions', $fileName, 'public');

            $dataQuestion = [
                'exam_id' => $exam->id,
                'right_answer' => $dataRightAnswers,
                'question_image_path' => $filePath
            ];
            Question::create($dataQuestion);
        }

        return redirect()->route('admin.exams.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        $questions = $exam->questions;
        return view('admin.exams.edit', compact('exam', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        $exam->title = $request->input('title');
        $exam->type = $request->input('type');
        $exam->duration = $request->input('duration');
        $exam->score_per_question = $request->input('score_per_question');
        $exam->save();

        $dataQuestionImages = $request->file('question_images');
        $dataRightAnswers = $request->input('right_answer');
        foreach ($exam->questions as $key => $question) {
            $question->right_answer = $dataRightAnswers[$key];
            if (isset($dataQuestionImages[$key])) {
                $fileName = $exam->id . '_question_' . $key . '.' . $dataQuestionImages[$key]->extension();
                $filePath = '/storage/' . $dataQuestionImages[$key+1]->storeAs('questions', $fileName, 'public');
                $question->question_image_path = $filePath;
            } else {
                if ($request->input("delete_question_image_{$key}") === '1') {
                    Storage::delete($question->question_image_path);
                    $question->question_image_path = null;
                }
            }
            $question->save();
        }

        return redirect()->route('admin.exams.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();

        return redirect()->route('admin.exams.index');
    }
}
