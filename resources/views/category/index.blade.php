@extends('layout.main')
    @section('title')
        CRUD using Ajax in laravel 5.3
    @endsection
@section('content')
    <div class="container">
    <h2>CRUD operations using Ajax() Laravel 5.3</h2>

        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">



        <script>

            @if(Session::has('success'))
                    toastr.success("{{ Session::get('success') }}");
            @endif

            @if(Session::has('info'))
                    toastr.info("{{ Session::get('info') }}");
            @endif

            @if(Session::has('warning'))
                    toastr.warning("{{ Session::get('warning') }}");
            @endif

            @if(Session::has('error'))
                    toastr.error("{{ Session::get('error') }}");
            @endif

        </script>

    {{--@if ($message = Session::get('success'))--}}
        {{--<div class="alert alert-success alert-block">--}}
            {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
            {{--<strong>{{ $message }}</strong>--}}
        {{--</div>--}}
    {{--@endif--}}
    <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Add</button>
    <table class="table table-bordered">
    <thead>
    <tr>
        <th>Category Name</th>
        <th>Category Description</th>
        <th>Category Color</th>
        <th>Category Icon</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>

    @foreach($values as $x)
        <tr>
            <td>{{$x -> category_name}}</td>
            <td>{{$x -> category_description}}</td>
            <td style="text-align: center"><i class="fa fa-circle fa-2x" aria-hidden="true" style="color: {{$x -> category_color}}"></i> &nbsp;{{$x -> category_color}}</td>
            <td style="text-align: center"><i class="{{$x -> category_icon }} fa-2x" style="color: {{$x -> category_color}}"></i></td>
            <td>
                <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="viewCategory('{{$x -> id}}')">View</button>
                <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="editCategory('{{$x -> id}}')">Edit</button>
                <button class="btn btn-danger" onclick="fun_delete('{{$x -> id}}')">Delete</button>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
    {{ $values->links() }}
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('category/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('category/delete')}}">

    {{--insertion from modal successful--}}
    <!-- Add Modal start -->
    <div class="modal fade" id="addModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Record</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('category') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_description">Category Description</label>
                                <input type="text" class="form-control" id="category_description" name="category_description">
                            </div>
                            <div class="form-group">
                                <label for="category_color">Category Color</label>
                                <input type="color" class="form-control" id="category_color" name="category_color" >
                                {{--<input type="text" class="form-control" id="category_color" name="category_color">--}}
                            </div>
                            <div class="form-group">
                                <label for="category_icon">Category Icon</label>
                                <input type="text" class="form-control" id="category_icon" name="category_icon">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- add code ends -->

    <!-- View Modal start -->
    <div class="modal fade" id="viewModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail of category in Modal</h4>
                </div>
                <div class="modal-body">
                    <p><b>Category Name: </b><span id="category_name" class="text-success"></span></p>
                    <p><b>Category Description: </b><span id="category_description" class="text-success"></span></p>
                    <p><b>Category Color: </b><span id="category_color" class="text-success"></span></p>
                    <p><b>Category Icon : </b><span id="category_icon" class="text-success"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- view modal ends -->

    <!-- Edit Modal start -->
    <div class="modal fade" id="editModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Category</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('category/update') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" id="edit_category_name" name="edit_category_name" val="">
                            </div>
                            <div class="form-group">
                                <label for="category_description">Category Description</label>
                                <input type="text" class="form-control" id="edit_category_description" name="edit_category_description">
                            </div>
                            <div class="form-group">
                                <label for="category_color">Category Color</label>
                                <input type="color" class="form-control" id="edit_category_color" name="edit_category_color" >
                                {{--<input type="text" class="form-control" id="category_color" name="category_color">--}}
                            </div>
                            <div class="form-group">
                                <label for="category_icon">Category Icon</label>
                                <input type="text" class="form-control" id="edit_category_icon" name="edit_category_icon">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">Update</button>
                        <input type="hidden" id="edit_id" name="edit_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>

        </div>
    </div>
    <!-- Edit code ends -->

</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@section('script')
    <script type="text/javascript">

    function viewCategory(id)
    {
        var view_url = $("#hidden_view").val();//id hidden_view vayeko value attribute ko data lincha so here /
//        console.log(view_url);
        $.ajax({
            url: view_url,//url line
            type:"GET",//method define garne
            data: {"id":id},
            success: function(result){
//                console.log(result);
                $("#category_name").text(result.category_name);
                $("#category_description").text(result.category_description);
                $("#category_color").text(result.category_color);
                $("#category_icon").text(result.category_icon);
            }
        });
    }

    function editCategory(id)
    {
        var view_url = $("#hidden_view").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                console.log(result);
                $("#edit_id").val(result.id);
                $("#edit_category_name").val(result.category_name);
                $("#edit_category_description").val(result.category_description);
                $("#edit_category_color").val(result.category_color);
                $("#edit_category_icon").val(result.category_icon);
            }
        });
    }

    function fun_delete(id)
    {
        var conf = confirm("Are you sure want to delete??");
        if(conf){
            var delete_url = $("#hidden_delete").val();
            $.ajax({
                url: delete_url,
                type:"POST",
                data: {"id":id,_token: "{{ csrf_token() }}"},
                success: function(response){
                    alert(response);
                    location.reload();
                }
            });
        }
        else{
            return false;
        }
    }
</script>
@endsection
