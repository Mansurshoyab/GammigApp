<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Video;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function image()
    {
        $photos = Image::all();
        return view('backend.media.image', get_defined_vars());
    }

    public function addImage()
    {
        return view('backend.media.addImage');
    }

    public function storeImage(Request $request)
    {

        $photo = new Image();

        if ($request->hasFile('image')) {
            $fileName = time() . "-" . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('_uploads'), $fileName);
            $photo->image = $fileName;
        }
        
        $photo->description = $request->description;
        $photo->save();
        return redirect()->route('image')->with('success', 'Upload successfully');
    }

    public function deleteImage(Image $image)
    {
        $image->delete();
        return back()->with('delete_success', 'Delete Successfully.');
    }

    public function editImage(Image $image)
    {
        return view('backend.media.editImage', get_defined_vars());
    }

    public function updateImage(Request $request, Image $image)
    {

        $image->description = $request->description;

        if ($request->hasFile('image')) {
            $fileName = time() . "-" . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('_uploads'), $fileName);
            $image->image = $fileName;
        }

        $image->save();

        return redirect()->route('image')->with('success', 'Image updated successfully');
    }


    public function video()
    {
        $videos = Video::all();
        return view('backend.media.video', compact('videos'));
    }

    public function addVideo()
    {
        return view('backend.media.addVideo');
    }

    public function storeVideo(Request $request)
    {
        $video = new Video();
        $video->title = $request->title;
        $video->section = $request->section;
        $video->video = $request->url;
        $video->description = $request->description;
        $video->save();
        return redirect()->route('video')->with('success', 'Video uploaded successfully');
    }

    public function editVideo(Video $video)
    {
        return view('backend.media.editVideo', compact('video'));
    }


    public function updateVideo(Request $request, Video $video)
    {
        $video->title = $request->title;
        $video->section = $request->section; // Assuming section is also being updated
        $video->video = $request->url; // Assuming video is the correct attribute to update the URL
        $video->description = $request->description; // Assuming description is also being updated
        $video->save();
        return redirect()->route('video')->with('success', 'Video updated successfully');
    }

    public function deleteVideo(Video $video)
    {
        $video->delete();
        return back()->with('delete_success', 'Video deleted successfully');
    }
}
