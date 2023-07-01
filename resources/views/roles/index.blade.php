<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div class="bg-light p-4 rounded">
                        <h1>Roles</h1>
                        <div class="lead">
                            Manage your roles here.
                            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Add role</a>
                        </div>

                        <div class="mt-2">
                            @include('layouts.partials.messages')
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <th width="1%">No</th>
                                <th>Name</th>
                                <th width="3%" colspan="3">Action</th>
                            </tr>
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}">Show</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form method="DELETE" action="{{ route('roles.destroy', $role->id) }}">
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>

                        <div class="d-flex">
                            {!! $roles->links() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>