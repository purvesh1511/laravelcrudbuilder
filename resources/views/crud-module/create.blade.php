<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('crud-module.store')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="module_name" class="col-sm-2 col-form-label">module_name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" id="module_name" name="module_name">
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <label for="controller_name" class="col-sm-2 col-form-label">controller_name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" id="controller_name" name="controller_name">
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <label for="model_name" class="col-sm-2 col-form-label">model_name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" id="model_name" name="model_name">
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <label for="view_path" class="col-sm-2 col-form-label">view_path</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" id="view_path" name="view_path">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>