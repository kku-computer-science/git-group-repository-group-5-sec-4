<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Models\Program;
use App\Models\User;
use App\Helpers\TranslateHelper;
use Illuminate\Http\Request;

class ResearcherController extends Controller
{
    public function index($id)
    {
        $locale = App::getLocale();

        $program = Program::findOrFail($id);

        $data = [
            'title' => TranslateHelper::translate('Researchers', $locale),
            'description' => TranslateHelper::translate($program->{'program_name_' . $locale}, $locale),
        ];

        $users = User::role('teacher')
            ->with(['program', 'expertise'])
            ->whereHas('program', function ($query) use ($id) {
                $query->where('id', '=', $id);
            })
            ->orderBy('fname_en')->get();

        return view('researchers', compact('data', 'users'));
    }
}