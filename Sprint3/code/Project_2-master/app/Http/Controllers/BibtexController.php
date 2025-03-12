<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\Paper;
use Bibtex;
use RenanBr\BibTexParser\Listener;
use RenanBr\BibTexParser\Parser;
use RenanBr\BibTexParser\Processor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//require 'vendor/autoload.php';


class BibtexController extends Controller
{
    function index($id)
    {
        //$paper3=Paper::with('author')->find([10]);
        // $paper3 = Paper::with(['author' => function ($query) {
        //     $query->select(DB::raw("CONCAT(author_fname,' ',author_lname) as author_name"));
        // }])->find([460])->first()->toArray();
        $locale = App::getLocale();
        $paper = Paper::with([
            'teacher' => function ($query) use ($locale) {
                    if ($locale === 'en') {
                        $query->select(DB::raw("CONCAT(concat(left(fname_en,1),'.'),' ',lname_en) as full_name"))
                            ->addSelect('user_papers.author_type');
                    } elseif ($locale === 'cn') {
                        $query->select(DB::raw("CONCAT(fname_cn, ' ', lname_cn) as full_name"))
                            ->addSelect('user_papers.author_type');
                    } elseif ($locale === 'th') {
                        $query->select(DB::raw("CONCAT(fname_th, ' ', lname_th) as full_name"))
                            ->addSelect('user_papers.author_type');
                    }
                },
            'author' => function ($query) use ($locale) {
                    if ($locale === 'en') {
                        $query->select(DB::raw("CONCAT(concat(left(author_fname,1),'.'),' ',author_lname) as full_name"))
                            ->addSelect('author_of_papers.author_type');
                    } elseif ($locale === 'cn') {
                        $query->select(DB::raw("CONCAT(author_fname_cn, ' ', author_lname_cn) as full_name"))
                            ->addSelect('author_of_papers.author_type');
                    } elseif ($locale === 'th') {
                        $query->select(DB::raw("CONCAT(author_fname_th, ' ', author_lname_th) as full_name"))
                            ->addSelect('author_of_papers.author_type');
                    }
                },

        ])->find([$id])->toArray();
        //return $paper;
        $author = array_map(function ($tag) {
            $t = collect($tag['teacher']);
            $a = collect($tag['author']);
            $aut = $t->concat($a);
            $aut = $aut->sortBy(['author_type', 'asc']);
            $sorted = $aut->implode('full_name', ' and ');
            return $sorted;
        }, $paper);


        $id = $paper[0]['id'];

        //$key =  'pariwat2021multi';
        $k = explode(" ", $paper[0]['author'][0]['full_name'])[0];
        $key = $k . $paper[0]['paper_yearpub'] . substr($paper[0]['paper_name'], 0, 5);
        $key = strtolower($key);
        $title = $paper[0]['paper_name'];
        $type = $paper[0]['paper_type'];

        //return $a[1];
        //return $a->implode('full_name', ' and ');
        $author = $author[0];
        $journal = $paper[0]['paper_sourcetitle'];
        $volume = $paper[0]['paper_volume'];
        $number = $paper[0]['paper_citation'];
        $page = $paper[0]['paper_page'];
        $year = $paper[0]['paper_yearpub'];
        $doi = $paper[0]['paper_doi'];

        $arr = array("type" => "Article", "key" => "watchara", "author" => $author, "title" => $title, "journal" => $journal, "volume" => $volume, "number" => $number, 'year' => $year, 'pages' => $page, 'doi' => $doi);
        //return  $arr;
        $Path['lib'] = './../lib/';
        require_once $Path['lib'] . 'lib_bibtex.inc.php';

        $Site = array();
        $name = "test.bib";
        $Site['bibtex'] = new Bibtex($name);
        $bb = $Site['bibtex'];
        //return  response()->json($bb);
        if (array_key_exists($key, $bb->bibarr)) {
            //return view('test', compact('key', 'bb'));
            // $bb->Select(array('key' => $key));
            // $bb->SetBibliographyStyle('natbib');
            // $bb->PrintBibliographySelectedOnly();
            return view('test', compact('key', 'bb'));
            //return $bb;
        } else {
            $fp = fopen($name, 'a');
            fwrite($fp, "\xEF\xBB\xBF");
            $text = "
        @article{" . $key . ",
            author    = {" . $author . "},
            title     = {" . $title . "},
            journal   = {" . $journal . "},
            year      = {" . $year . "},
            pages      = {" . $page . "},
            doi      = {" . $doi . "},
            number      = {" . $number . "},
            volume      = {" . $volume . "},
          }";
            fwrite($fp, $text);
            fclose($fp);
            $Site['bibtex'] = new Bibtex($name);
            $bb = $Site['bibtex'];

            return view('test', compact('key', 'bb'));
            // $bb->Select(array('key' => $key));
            // $bb->SetBibliographyStyle('natbib');
            // $bb->PrintBibliographySelectedOnly();
            //return response()->json($key,$bb);
            
            //return  response()->json($bb);
        }

        return response()->json([
            'key' => $key,
            'bibtex' => mb_convert_encoding($bb->bibarr, 'UTF-8', 'auto') // 🔹 ป้องกัน Encoding ผิด
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //return view('test', compact('key', 'bb'));

    }

    public function getbib($id)
    {
        // return $request;
        // $id = $request;
        $name = $this->index($id);
        return $name;
    }
}
