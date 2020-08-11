@extends('layouts.app', ['activePage' => 'Country-Management', 'titlePage' => __('Country List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Country Management</h4>
            <p class="card-category"> Please add the country</p>
          </div>
          <div class="col-12 text-right">
            <a data-toggle = "modal" href = "" data-target = "#add_country" class="btn btn-sm btn-primary">Add country</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    No
                  </th>
                  <th>
                    Country Title
                  </th>
                  <th>
                    Country Code
                  </th>
                  <th>
                    Action
                  </th>
                </thead>
                <tbody>

                  @foreach($countries as $country)
                    <tr>
                      <td>{{$index++}}</td>
                      <td>{{$country->country_title}}</td>
                      <td class="text-primary">{{$country->country_code}}</td>
                      <td>
                        <form method="post" action="{{ route('countries.destroy', $country->id) }}">
                        <a class="btn btn-info btn-fab btn-fab-mini btn-round">
                          <i class="material-icons" onclick = "country_edit({{$country}});" style="color:white">edit</i>
                        </a> 
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-danger btn-fab btn-fab-mini btn-round"  onclick="confirm('{{ __(' Are you sure you want to delete?') }}') ? this.parentElement.submit() : ''" style="color:white">
                          <i class="material-icons">delete</i>
                        </a>
                        </form> 
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="add_country" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('countries.store') }}">
        @csrf
        <div class="modal-body">
            <div class="w-50 mx-auto">
              <div class="input-group">
                <input name="country_title" type="text" class="form-control" placeholder="Input country title" require>
              </div>
              <br>
              <div class="input-group">
                <input name="country_code" type="text" class="form-control" placeholder="Input country code" require>
              </div>
            </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- update Modal -->
<div class="modal fade" id="edit_country" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('countries.store') }}">
        @csrf
        <div class="modal-body">
            <div class="w-50 mx-auto">
              <input name="id" id = "country_id" type="hidden">
              <div class="input-group">
                <input name="country_title" id = "country_title" type="text" class="form-control" require>
              </div>
              <br>
              <div class="input-group">
                <input name="country_code" id = "country_code" type="text" class="form-control" require>
              </div>
            </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection