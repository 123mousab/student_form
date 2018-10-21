@extends('layout.index')
@section('content')
@section('css')
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    @endsection
@section('js')
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    {{--<script type="text/javascript">
        $(document).on('click','#add_student',function () {
            var form = $('#student').serialize();
            var url = $('#student').attr('action');
            $.ajax({
            url:url,
                dataType:'json',
                data:form,
                type:'POST',
                beforeSend: function () {
                    $('.alert_error h1').empty();
                    $('.alert_error ul').empty();
                },success: function (data) {
                    if (data.status == true){
                        $('.list_student tbody').append(data.result);
                        $('#student')[0].reset();

                    }

                },error: function (data_error,exception) {
                    if(exception == 'error'){
                        $('.alert_error h1').html(data_error.responseJSON.message);
                        var error_list = '';
                        $.each(data_error.responseJSON.errors,function (index,v) {
                            error_list += '<li>'+v+'</li>';
                        });
                        $('.alert_error ul').html(error_list);
                        //alert(data_error.responseJSON.message);
                    }
                }
            });
            return false;
                    });
    </script>--}}
@endsection
        <div class="alert_error">
            <center><h1></h1></center>
            <ul>

            </ul>
        </div>

        <center><h1>{{trans('admin.myName')}}</h1></center>  <!-- use lang -->

        <div class="flex-center position-ref full-height">
            {!! Form::open(['url'=>'insert/student','id'=>'student']) !!}
            {!! Form::text('firstName',old('firstName'),['placeholder' => 'First Name','class'=>'anyclass','id'=>'anyid']) !!}<br>
            {!! Form::text('user_id',old('user_id'),['placeholder' => 'User Id','class'=>'anyclass','id'=>'anyid']) !!}<br>
            {!! Form::email('email',old('email'),['placeholder' => 'Email','class'=>'anyclass','id'=>'anyid']) !!}<br>
            {!! Form::select('sex',[''=>'Choose Sex','male'=>'Male','female'=>'Female'],old('sex'),['class'=>'anyclass','id'=>'anyid']) !!}<br>
            {!! Form::textarea('note',old('note'),['placeholder' => 'Notes','class'=>'anyclass','id'=>'anyid']) !!}<br>
            {!! Form::submit('Send Value',['id'=>'add_student']) !!}<br>
            {{--{!! Form::input('password','test') !!} type===>('password')|| name=>'test' --}}
            {!! Form::close() !!}
            <hr>
            {{--<form method="post" action="{{ url('insert/student') }}">
                <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                <input type="text" name="firstName" placeholder="First Name"><br>
                <input type="text" name="lastName" placeholder="Last Name"><br>
                <input type="email" name="email" placeholder="Email"><br>
                <select name="sex">
                    <option value="">Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select><br>
                <textarea name="note">Notes</textarea><br>
                <input type="submit" value="Submit Query" />
            </form>--}}
            <?php
                $data = 'Test Data';
            ?>
            {{--@include('layout.other_file')--}}
            @include('layout.other_file',['key'=>$data,'key2'=>'Weclome To Larvael PHP'])
            <div class="content">   
                    <form method="POST" action="{{ url('del/student/') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                <table class="list_student">
                    <tr>
                        <th>First Name</th>
                        <th>User Id</th>
                        <th>Email</th>
                        <th>Sex</th>
                        <th>Deleted Status</th>
                        <th>Delete</th>
                    </tr>
                    <tbody>
                        @foreach($student_info as $stu)
                            @include('layout.row_student')
                        @endforeach
                    </tbody>
                </table>
                               <input type="submit" name="delete" value="Delete Multiple">
                               <input type="submit" name="forcedelete" value="force Delete">
                </form>
                <hr/>
                <center>Trashed Data</center>
                <form method="POST" action="{{ url('del/student/') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
            <table>
                <tr>
                    <th>First Name</th>
                    <th>User Id</th>
                    <th>Email</th>
                    <th>Sex</th>
                    <th>Delete</th>
                </tr>
               
                @foreach($trashed as $trash)
                <tr>
                    <td>{{$trash->firstName}}</td>
                    <td>{{$trash->user_id}}</td>
                    <td>{{$trash->email}}</td>
                    <td>{{$trash->sex}}</td>
                    <td>                                                           
                           <input type="checkbox" name="id[]" value="{{ $trash->id }}">
                    </td>
                </tr>        
                @endforeach
                            
            </table>
                           <input type="submit" name="restore" value="restore">
                           <input type="submit" name="forcedelete" value="force Delete">
            </form>
            </div>
        </div>
@endsection