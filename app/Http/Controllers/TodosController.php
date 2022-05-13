<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Repositories\Interfaces\TodoRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{

    private $todoRepository;
    public function __construct(TodoRepositoryInterface $todoRepositoryInterface)
    {
        $this->todoRepository = $todoRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listTodo = $this->todoRepository->getListTodoByCondition($request);
        return view('todos.index', compact('listTodo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return form
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $data = $request->all();
        $todo = new Todo();
        $todo->user_id = Auth::user()->id;
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        try{
            $todo->save();
        }catch(\Exception $exception){
            return redirect()->route('todos.index')->with('error', 'Đăng kí task thất bại');
        }
        return redirect()->route('todos.index')->with('success', 'Thêm task thành công');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::where('id', $id)->get();
        return view('todos.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        if($todo){
            return view('todos.edit', compact('todo'));
        }else{
            return redirect()->route('todos.index')->with('error', 'Không tìm thấy task');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, $id)
    {
        $data = $request->all();
        try{
            $todo = Todo::find($id);
            if($todo){
              $todo->name = $data['name'];
              $todo->description = $data['description'];
              $todo->save();  
            }else{
                return redirect()->route('todos.index')->with('error', 'Không tìm thấy task');
            }
            
        }catch(\Exception $exception){
            return redirect()->route('todos.index')->with('error', 'Update task thất bại');
        }
        return redirect()->route('todos.index')->with('success', 'Update task thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $todo = Todo::find($id);
            if($todo){
              $todo->delete();  
            }else{
                return redirect()->route('todos.index')->with('error', 'Không tìm thấy task');
            }
            

        }catch(\Exception $exception){
            return redirect()->route('todos.index')->with('error', 'Xóa task thất bại');

        }
        return redirect()->route('todos.index')->with('success', 'Delete task thành công');
    }
}
