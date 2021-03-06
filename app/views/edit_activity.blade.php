<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iCheck｜編輯活動</title>
    @include('import',array('target'=>'活動簽到'))
    <script>
        $(document).ready(function(){
            $('#activity_date').datepicker();
        })
        
        
    </script>
</head>

<body>
    <div id="wrapper">
        @include('menu')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <h1>編輯活動</h1>
                    </div>
                    <div class="row">
                        <ul class="breadcrumb">
                            <li>活動簽到</li>
                            <li><a href="{{url()}}/activity/view">檢視活動</a></li>
                            <li><a href="{{url()}}/activity/edit/{{$data->aid}}">編輯活動</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h3>活動資料</h3>
                    {{Form::model($data)}}
                        <table class="table">
                            <tr>
                                <td class="col-md-3 field-name">活動名稱</td>
                                <td class="col-md-9">{{Form::text('activity_name',null,array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>活動內容</td>
                                <td>{{Form::textarea('activity_desc',null,array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>活動日期</td>
                                <td>{{Form::text('activity_date',str_replace('1970/01/01','',date('Y/m/d',strtotime($data['activity_date']))),array('class'=>'form-control','id'=>'activity_date'))}}</td>
                            </tr>
                            <tr>
                                <td>簽到類型</td>
                                <td>
                                    {{
                                        Form::select('activity_type',array(
                                            'no_check'=>'無需事先報名',
                                            'strict_check'=>'需事先報名',
                                            'only_prompt'=>'需事先報名，但可現場補報'
                                        ),null,array('class'=>'form-control'))
                                    }}
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>名冊選擇</td>
                                <td>
                                    {{Form::select('nid',$namelist,null,array('class'=>'form-control'))}}
                                </td>
                            </tr>
                            
                            <tr>
                                <td>主辦單位</td>
                                <td>{{Form::text('activity_organize',null,array('class'=>'form-control'))}}</td>
                            </tr>
                            <tr>
                                <td>狀態</td>
                                <td>
                                    {{
                                        Form::select('enable',array(
                                            '1'=>'啟用',
                                            '0'=>'停用'
                                        ),null,array('class'=>'form-control'))
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td>備註</td>
                                <td>{{Form::textarea('activity_note',null,array('class'=>'form-control','rows'=>5))}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="送出" class="btn btn-lg btn-primary pull-right"></td>
                            </tr>
                        </table>
                    {{Form::close()}}
                </div>
            </div> <!-- row end -->
        </div>  <!-- page-wrapper -->
    </div>
</body>
</html>
