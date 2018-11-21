<?php
?>

    <!doctype html>
    <html>

    <head>


        <script language="javascript">
        <!--
        var oTbl;
        //슬라임 추가
        function insRow() {
          oTbl = document.getElementById("addTable");
          var oRow = oTbl.insertRow();
          oRow.onmouseover=function(){oTbl.clickedRowIndex=this.rowIndex}; //clickedRowIndex - 클릭한 Row의 위치를 확인;
          var oCell = oRow.insertCell();

          //삽입될 Form Tag
          var frmTag = "<div style='display:flex'><input class=form-control type=text style=width:300px display:inline-block; placeholder='슬라임 이름 입력' name="+Snum+" ><button onClick='removeRow()' class='btn btn-light btn-sm'>삭제</button></div>";
          oCell.innerHTML = frmTag;
        }
        // 슬라임 삭제
        function removeRow() {
          oTbl.deleteRow(oTbl.clickedRowIndex);
        }

        function Snum() {
            var Snum;

            for(var i = 0; i <= frm.elements.length -1; i++ ){
                var Snum = "S"+ (i+1);
            }
        }

        function frmCheck()
        {
          var frm = document.form;
          
          for( var i = 0; i <= frm.elements.length - 1; i++ ){
             if( frm.elements[i].name == "addText" )
             {
                 if( !frm.elements[i].value ){
                     alert("값을 채워주세요 ! ");
                         frm.elements[i].focus();
             return;
                  }
              }
           }
         }
        //-->
        </script>
        <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
        <link href="{{asset('css/blog.css')}}" rel="stylesheet">
        @yield('mdb')
    </head>
    <body>
        @yield('header')    
        @yield('write_form')
        <script>
            CKEDITOR.replace( 'editor1', {

                filebrowserUploadUrl : '{{asset('writeUpload.php')}}',
            });
        </script>
    </body>
        @yield('footer')
    </html>