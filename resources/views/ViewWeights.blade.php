@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new Measuring unit') }}</div>

                <div class="card-body">
                    <form method="POST" action="<?php  echo url('/');  ?>/CreateWeight">
                        @csrf

                        <div class="form-group row">
                            <label for="measure_unit" class="col-md-4 col-form-label text-md-right">{{ __('Measuring Unit') }}</label>

                            <div class="col-md-6">
                                <input id="measure_unit" type="text" class="form-control" name="measure_unit" value="{{ old('Measure Unit') }}" required  autofocus>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table">
                <br>
                <h4>List of Measuring units</h4>
                <thead>
                    <tr>
                        <th scope="col">Measuring Unit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($weights as $weight){ ?>
                    <tr>
                        <td scope="row"><?php echo $weight->measure_unit;?></td>
                        <td class="center"><a href="<?php  echo url('/');  ?>/DeleteWeight/<?php echo $weight->id;?>">Delete</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
