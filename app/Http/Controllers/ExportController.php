<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Image;
use App\Project;
use App\Tag;
use App\User;
use Session;


class ExportController extends Controller
{

   //making a private function to reuse for every item to be exported

    private function export($collection) {

      //checking if the table is empty and displaying a message if so

      if (!$collection->count()) {
        Session::flash('error' , 'Table is Empty');
        return redirect()->back();
      }

      // Making the collection into a array and setting the headers

      $data = $collection->toArray();
      header('Content-Disposition: attachment; filename="export.csv"');
      header("Cache-control: private");
      header("Content-type: application/force-download");
      header("Content-transfer-encoding: binary\n");

      //setting the file direction to the php output stream

      $out = fopen('php://output', 'w');

      //putting the first rows keys as the first row
      fputcsv($out, array_keys($data[0]));

      //looping the array and sending the data to the file $out.
      foreach($data as $line)
      {
        fputcsv($out, $line);
      }

      fclose($out);

    }

    //Sending the user the the export page

    public function index() {
      return view('admin.export.index');
    }

    // Reusing the export function for every table by only sending the collection as a parameter.

    public function exportImage(){

        return $this->export(Image::all());

    }
    public function exportProject(){

        return $this->export(Project::all());

    }
    public function exportTag(){

        return $this->export(Tag::all());

    }
    public function exportUser(){

        return $this->export(User::all());

    }
}
