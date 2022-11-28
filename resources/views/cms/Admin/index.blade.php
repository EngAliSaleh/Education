    @extends('cms.dashboard')

    @section('title', 'Admins ')

    @section('styles')
    @endsection

    @section('main-title', ' Admins')
    @section('sub-title', ' Admins')


    @section('content')
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header  bg-dark">


                        <form action="" method="get" style="margin-bottom:2%;">
                            <div class="row">

                                <div class="input-icon col-md-2">
                                    <input type="text" class="form-control" placeholder="Search By Email" name='email'
                                        @if (request()->email) value={{ request()->email }} @endif />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-success btn-md" type="submit">Search filter</button>
                                    <a href="{{ route('admins.index') }}" class="btn btn-danger">End search</a>
                                    <a href="{{ route('admins.create') }}"><button type="button"
                                            class="btn btn-md btn-info"> Add New Admin </button></a>

                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 ">
                        <table class="table table-bordered table-dark">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>image </th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Gender</th>
                                    <th>status</th>
                                    <th>Address</th>
                                    <th>setting</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>

                                        <td>{{ $admin->id }}</td>
                                        <td> <img class="img-circle img-bordered-sm"
                                                src="{{ asset('storage/images/admin/' . $admin->user->image) }}"
                                                width="60" height="60" alt="User Image"></td>
                                        <td>{{ $admin->user ? $admin->user->first_name : 'Not Value' }}</td>
                                        <td>{{ $admin->user ? $admin->user->last_name : 'Not Value' }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->user ? $admin->user->country->name : 'Not Value' }}</td>
                                        <td>{{ $admin->user ? $admin->user->city->name : 'Not Value' }}</td>
                                        <td>{{ $admin->user ? $admin->user->gender : 'Not Value' }}</td>
                                        <td>{{ $admin->user ? $admin->user->status : 'Not Value' }}</td>
                                        <td>{{ $admin->user ? $admin->user->address : 'Not Value' }}</td>


                                        <td class="btn-group">
                                            <a href="{{ route('admins.edit', $admin->id) }}" type="button"
                                                class="btn btn-info">Edite</a>

                                            <a href="#" onclick="performDestroy({{ $admin->id }},this )"
                                                class="btn btn-danger">Delete</a>
                                            <a href="{{ route('admins.show', $admin->id) }}" type="button"
                                                class="btn btn-success">Show</a>


                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>

                    {{ $admins->links() }}
                </div>

            </div>
        </div>
    @endsection



    @section('scripts')
        <script>
            function performDestroy(id, referance) {
                let url = '/cms/admin/admins/' + id; //حطينا سلاش قبل بعد اسم الجدول عشان في بعديت باراميتر والي هوا ال اي دي
                confirmDestroy(url, referance);
            }
        </script>
    @endsection
