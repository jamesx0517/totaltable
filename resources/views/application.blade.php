@extends('layouts.app')
@section('script')
<script>


key=new Array(3);
key[1]=new Array(6);
key[2]=new Array(6);


key[1][0]="電腦主機";
key[1][1]="螢幕";
key[1][2]="鍵盤/滑鼠";
key[1][3]="印表機";
key[1][4]="讀卡機";
key[1][5]="其他";

key[2][0]="HIS";
key[2][1]="PACS";
key[2][2]="護理資訊系統";
key[2][3]="網站";
key[2][4]="OFFICE";
key[2][5]="其他";

key2=new Array(3);
key2[1]=new Array(4);
key2[2]=new Array(6);


key2[1][0]="硬體/設備-新增";
key2[1][1]="硬體/設備-維修";
key2[1] [2]="硬體/設備-安裝";
key2[1] [3]="其他";


key2[2][0]="軟體/系統-新增";
key2[2][1]="軟體/系統-調整";
key2[2][2]="軟體/系統-異常";
key2[2][3]="軟體/系統-資料異常";
key2[2][4]="軟體/系統-不會操作";
key2[2][5]="其他";





function Buildkey(num)
{ document.myForm.project.selectedIndex=0;
  if (num==1){var a=1;}
  else if (num==2) {var a=7; }

    for(ctr=0;ctr<key[num].length;ctr++)
    {
    document.myForm.project.options[ctr]=new Option(key[num][ctr],ctr+a);
    }

 document.myForm.project.length=key[num].length;
}

function Buildkey2(num)
{
  document.myForm.nature.selectedIndex=0;
  if (num==1){var a=1;}
  else if (num==2) {var a=5; }

  for(ctr=0;ctr<key2[num].length;ctr++)
  {
    document.myForm.nature.options[ctr]=new Option(key2[num][ctr],ctr+a);
  }
 document.myForm.nature.length=key2[num].length;
}



</script>


@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">維修申請</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Pcrepair.store') }}" Name="myForm">
                        @csrf
	                       <div class="form-group row">
	                           <label for="title" class="col-md-4 col-form-label text-md-right">類別</label>
                             <SELECT Name="category" id="category" OnChange="Buildkey(this.selectedIndex);Buildkey2(this.selectedIndex);">
                               <OPTION Value=""></OPTION>
                               <OPTION Value="1">硬體/設備</OPTION>
                               <OPTION Value="2">軟體/系統</OPTION>

                             </Select>
                        </div>
                        <div class="form-group row">
                      	     <label for="title" class="col-md-4 col-form-label text-md-right">總類</label>
                             <SELECT Name="project"  id="project" >
                             </Select>
                        </div>
                        <div class="form-group row">
                      	     <label for="title" class="col-md-4 col-form-label text-md-right">需求</label>
                             <SELECT Name="nature" id="nature">
                             </Select>
	                      </div>
												<div class="form-group row">

													<input id="uid" type="hidden" name="uid" value=  '{{ Auth::user()->id }}' >
                          <input id="pid" type="hidden" name="pid" value='{{ Auth::user()->pid }}' >
                          <input id="status" type="hidden" name="status" value='4' >
                        	<input id="it" type="hidden" name="it" value='3' >


											</div>







                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">主旨</label>

                            <div class="col-md-6">
                                <input id="title" type="text" name="title" value= >


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="note" class="col-md-4 col-form-label text-md-right">內容</label>

                            <div class="col-md-6">
                                <textarea  id="note" type="textarea"  name="note" class="form-control">

                                </textarea>
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    送出
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
