<?php
namespace App\Http\Controllers\Admin;
use App\Traits\SlugTrait;
use App\Models\Category;
use App\Traits\TranslationTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CategoryStoreRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;
class CategorieController extends Controller
{
    use SlugTrait;
    use TranslationTrait;
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
     {
        $categoryies=$this->categoryService->gatAllCategory();
        return view('dashboard.categoryies.index',compact('categoryies'));
     }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
       $validator = $request->validated();
       $data= $this->categoryService->createCategory($request);
  
        $this->translate($request, 'Category', $data->id);
        session::flash('success', 'تمت   الاضافة  بنجاح ');
        return redirect('dashboard/categoryies');
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
    public function edit(string $id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request,$id)
    {
        $data= $this->categoryService->updateCategory($request ,$id);
        $this->editTranslation($request, 'Category', $data->id);
        $data->save();
       session::flash('update', 'تم   التعديل  بنجاح ');
        return redirect('dashboard/categoryies');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
