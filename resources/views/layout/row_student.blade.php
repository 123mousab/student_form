<tr>
    <td>{{$stu->firstName}}</td>
    {{-- <td>{{$stu->user_id()->first()}}</td>--}}
    <td>{{$stu->user_id()->first()->name}}
    <td>{{$stu->email}}</td>
    <td>{{$stu->sex}}</td>
    <td>{{ !empty($stu->deleted_at)?'Trashed':'Published' }}</td>
    <td>
        <input type="checkbox" name="id[]" value="{{ $stu->id }}">
    </td>
</tr>