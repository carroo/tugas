<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Teman extends Component
{
    public $name,$birthday,$idm;
    protected $rules = [
        'name' => 'required',
        'birthday' => 'required',
    ];
    public function render()
    {
        return view('livewire.teman',[
            "friends" => DB::table("teman")->get(),
            "nothing" => DB::table("teman")->first()
        ]);
    }
    public function back(){
        $this->name ="";
        $this->birthday ="";
        $this->idm = "";
    }
    public function simpan(){
        $this->validate();
        if($this->idm){
            DB::table("teman")->where('id',$this->idm)->update([
                "name" => $this->name,
                "birthday" => $this->birthday
            ]);
        }else{
            DB::table("teman")->insert([
                "name" => $this->name,
                "birthday" => $this->birthday
            ]);
        }
        $this->back();
    }
    public function edit($id){
        $get = DB::table("teman")->where('id',$id)->first();
        $this->name = $get->name;
        $this->birthday =$get->birthday;
        $this->idm = $get->id;
    }
    public function hapus($id){
        DB::table("teman")->where('id',$id)->delete();

    }
}
