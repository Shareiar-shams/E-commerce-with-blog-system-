<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Admin\ArrivalCategory;
use App\Model\Admin\arrival;
use App\Model\Admin\contact;
use App\Model\Admin\fontedit;
use App\Model\Admin\product;
use App\Model\Admin\product_category;
use App\Model\Admin\slideingimage;
use App\Model\Admin\socialmedia;
use App\Model\Admin\subcategory;
use App\Model\Admin\testimonial;
use App\Model\User\post;
use App\Model\User\postcategory;
use App\Model\User\tag;
use Illuminate\Support\Facades\Session;
use DB;
use Auth;
use Illuminate\Http\Request;
class ViewportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = DB::table('fontedits')->count();
        if($c>0)
        {
            $medias = socialmedia::all();
            $logos = fontedit::where('id',1)->first();
            $sliders = slideingimage::all();
            $categories = ArrivalCategory::all();
            $testimonials = testimonial::all();
            $subcategories = subcategory::all();
            $arrivals = arrival::orderBy('created_at','DESC')->take(6)->get();

            return view('user.welcome',compact('logos','medias','sliders','categories','arrivals','testimonials','subcategories'));
        }
        else
        {
            DB::table('fontedits')->insert(array("logo"=>'noimage.jpg',"phoneNo"=>'+8801770129781'));
            $medias = socialmedia::all();
            $logos = fontedit::where('id',1)->first();
            $sliders = slideingimage::all();
            $categories = ArrivalCategory::all();
            $testimonials = testimonial::all();
            $subcategories = subcategory::all();
            $arrivals = arrival::orderBy('created_at','DESC')->take(6)->get();
            return view('user.welcome',compact('logos','medias','sliders','categories','arrivals','testimonials','subcategories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the page for shop or buysomething.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
        $medias = socialmedia::all();
        $logos = fontedit::where('id',1)->first();
        $products = product::where('status',1)->orderBy('created_at','DESC')->paginate(9);
        // $category = product_category::all();
        $subcategories = subcategory::all();
        $product = product::where('status',1)->orderBy('created_at','ASC')->paginate(3);
        return view('user.shop',compact('medias','logos','products','subcategories','product'));
    }


    // public function categories(categories $categories)
    // {
    //     $medias = socialmedia::all();
    //     $logos = fontedit::where('id',1)->first();
    //     $products = product::where('status',1)->orderBy('created_at','DESC')->paginate(9);
    //     $category = product_category::all();
    //     $subcategory = $categories->subcategories();
    //     $subcategories = subcategory::all();
    //     return view('user.shop',compact('medias','logos','products','category','subcategories','subcategory'));
    // }

     public function subcategories(subcategory $subcategories)
    {
        $medias = socialmedia::all();
        $logos = fontedit::where('id',1)->first();
        $products = $subcategories->product();
        // $category = product_category::all();
        // $subcategory = $categories->subcategories();
        $subcategories = subcategory::all();
        $product = product::where('status',1)->orderBy('created_at','ASC')->paginate(3);
        return view('user.shop',compact('medias','logos','products','subcategories','product'));
    }

    /**
     * Show the page for Product Details.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_details($slug)
    {
        $medias = socialmedia::all();
        $logos = fontedit::where('id',1)->first();
        $subcategories = subcategory::all();
        $product = product::where('slug',$slug)->orWhere('status',1)->first();
        $products = product::where('status',1)->orderBy('created_at','ASC')->paginate(3);
        return view('user.product-details',compact('medias','logos','subcategories','product','products'));
    }

    /**
     * Show the page for Checkout.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout($cartCollection)
    {
        $medias = socialmedia::all();
        $logos = fontedit::where('id',1)->first();
        $subcategories = subcategory::all();
        return view('user.checkout',compact('medias','logos','subcategories'));
    }

    /**
     * Show the page for Contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $c = DB::table('contacts')->count();
        if($c > 0)
        {
            $medias = socialmedia::all();
            $logos = fontedit::where('id',1)->first();
            $contact = contact::all()->first();
            $subcategories = subcategory::all();
            return view('user.contact',compact('medias','logos','contact','subcategories'));
        }
        else
        {
            DB::table('contacts')->insert(array("address"=>'Suvechaa-453, Sheik-ghat, Sylhet. Bangladesh.',"phoneNo"=>'+8801770129781',"email"=>'shareiarshams30015@gmail.com'));
            $medias = socialmedia::all();
            $logos = fontedit::where('id',1)->first();
            $contact = contact::all()->first();
            $subcategories = subcategory::all();
            return view('user.contact',compact('medias','logos','contact','subcategories'));
        }
    }

    public function about()
    {
        $medias = socialmedia::all();
        $logos = fontedit::where('id',1)->first();
        $subcategories = subcategory::all();
        return view('user.about',compact('medias','logos','subcategories'));
    }


    public function blog()
    {
        $medias = socialmedia::all();
        $logos = fontedit::where('id',1)->first();
        $subcategories = subcategory::all();
        $posts = post::where('status',1)->orderBy('created_at','DESC')->paginate(4);
        $tags = tag::all();
        $categories = postcategory::withCount('post')->get();
        $limitedpost = post::where('status',1)->orderBy('view_count', 'DESC')->take(4)->get();
        return view('user.blog',compact('medias','logos','subcategories','posts','tags','categories','limitedpost'));
    }

     public function tag(tag $tag)
    {
        $medias = socialmedia::all();
        $logos = fontedit::where('id',1)->first();
        $subcategories = subcategory::all();
        $posts = $tag->posts();
        $tags = tag::all();
        $categories = postcategory::withCount('post')->get();
        $limitedpost = post::where('status',1)->orderBy('view_count', 'DESC')->take(4)->get();
        return view('user.blog',compact('medias','logos','subcategories','posts','tags','categories','limitedpost'));
    }

    public function postcategories(postcategory $categories)
    {
        $medias = socialmedia::all();
        $logos = fontedit::where('id',1)->first();
        $subcategories = subcategory::all();
        $posts = $categories->posts();
        $tags = tag::all();
        $categories = postcategory::withCount('post')->get();
        $limitedpost = post::where('status',1)->orderBy('view_count', 'DESC')->take(4)->get();
        return view('user.blog',compact('medias','logos','subcategories','posts','tags','categories','limitedpost'));
    }

    public function blog_details(post $slug)
    {
        if (Auth::check()) 
        {
            $medias = socialmedia::all();
            $logos = fontedit::where('id',1)->first();
            $subcategories = subcategory::all();
            $tags = tag::all();
            $categories = postcategory::withCount('post')->get();
            $limitedpost = post::where('status',1)->orderBy('view_count', 'DESC')->take(4)->get();
            $blogKey = 'blog_details' . $slug->id;
            if (!Session::has($blogKey)) {
                $slug->increment('view_count');
                    Session::put($blogKey, 1);
            }
            return view('user.blog_details',compact('slug','medias','logos','subcategories','tags','categories','limitedpost'));
        }
        return redirect(route('login'));
    }

    public function search(Request $request)
    {
        $this->validate($request,[
            'search' => 'required',
        ]);
        $search = $request->input('search');

        $posts = post::where('status',1)
                ->where(function($query) use ($search){
                $query->where('title', 'LIKE',  '%'.$search .'%')
                      ->orWhere('slug', 'LIKE',  '%'.$search .'%')
                      ->get();
                })->paginate(4);

        $medias = socialmedia::all();
        $logos = fontedit::where('id',1)->first();
        $subcategories = subcategory::all();
        $tags = tag::all();
        $categories = postcategory::withCount('post')->get();
        $limitedpost = post::where('status',1)->orderBy('view_count', 'DESC')->take(4)->get();
        return view('user.blog',compact('medias','logos','subcategories','posts','tags','categories','limitedpost'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
