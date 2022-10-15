<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortRequest;
use App\Models\ShorterUrl;
use Illuminate\Http\Request;


class ShorterUrlController extends Controller
{
    public function short(ShortRequest $request)
    {
        if($request->url){
            $new_url = ShorterUrl::create([
                'url'=>$request->url
            ]);
        }
        if($new_url){
            $short_url = base_convert($new_url->id,10,36);
            $new_url->update([
                'short_url' => $short_url
            ]);

            return redirect()->back()->with('success_message', 'Congratulations you made it, here is your shortened url:
                 <a class="text-decoration-none" href="' .url($short_url) .'">'. url($short_url) . '</a>' );
        }
    }
    public function show($code)
    {
        $short_url = ShorterUrl::where('short_url',$code)->first();

        if($short_url){
            return redirect()->to(url($short_url->url));
        }
        return redirect()->to(url('/'));
    }
}

