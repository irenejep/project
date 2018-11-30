<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
use App\Lesson;
  
class LessonsController extends Controller
{
    public function index(){
        return view('show_lessons');

    }
    public function save(Request $request){
        $this->validate($request,[
        'name'=>'required',
        'description'=>'required',
        ]);
        $lesson = new Lesson();
        $lesson->name = $request->input('name');
        $lesson->description = $request->input('description');
        $lesson->save();
    }
    public function update(Request $request){
        $this->validate($request,[
            'id'=>'required',
            'name'=>'required',
            'description'=>'required'
            ]);
        $id = $request->id;
        $lesson = Lesson::findOrFail($id);
        $lesson->name = $request->name;
        $lesson->description = $request->description;
        $lesson->save();
        }
        
    public function get(){
        $lessons = Lesson::all();
        echo $lessons;
    }
    public function delete(Lesson $id){
        $id->delete();
        $lesson = Lesson::all();
        echo $lesson;
    }
    public function getSingle($id){
        $lesson = Lesson::find($id);
    echo json_encode ($lesson);
    }
    public function archive(){
        $archives = Lesson::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
        return view('show_lessons', compact('archives'));
    }
}
