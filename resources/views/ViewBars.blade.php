@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new Bar') }}</div>

                <div class="card-body">
                    <form method="POST" action="<?php  echo url('/');  ?>/CreateBar">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('Name') }}" required  autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">                                
                                <select name="type" id="type" class="form-control" required autofocus>
                                <option value="0">Internal</option>
                                <option value="1">External</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="measurement" class="col-md-4 col-form-label text-md-right">{{ __('Measurement') }}</label>

                            <div class="col-md-3">
                                <input id="measurement" type="text" class="form-control" name="measurement" value="{{ old('Measurement') }}" required  autofocus>
                            </div>
                            <div class="col-md-3">
                            <select name="weight_id" id="weight_id" class="form-control" required autofocus>
                                <?php foreach($weights as $weight) { ?>
                                    <option value="{{$weight->id}}"><?php echo $weight->measure_unit;?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="safe_id" class="col-md-4 col-form-label text-md-right">{{ __('Safe') }}</label>

                           
                            <div class="col-md-3">
                            <select name="safe_id" id="safe_id" class="form-control" required autofocus>
                                <?php foreach($safes as $safe) { ?>
                                    <option value="{{$safe->id}}"><?php echo $safe->name;?></option>
                                <?php } ?>
                                </select>
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
                <h4>List of Bars</h4>
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Name of safe</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($bars as $bar){ ?>
                        <tr>
                    <td><?php echo $bar->name;?> </td>
                        <td scope="row"><?php if($bar->type == 0){
                            echo "Internal";
                        }
                        else{
                            echo "External";
                        }?></td>
                        <td> <?php 
                            $bars1 = App\Bar::find($bar->id)->safe;
                                    $cnt = 0;
                             foreach( $bars1->toArray() as $key => $value )
                                {
                                       $cnt++;
                                       if($cnt==6)
                                            echo $value;
                                }?>
                        </td>
                        <td>
                        <?php 
                            echo $bar->measurement;echo " ";
                            $bars2 = App\Bar::find($bar->id)->weight;
                                    $cnt = 0;
                             foreach( $bars2->toArray() as $key => $value )
                                {
                                       $cnt++;
                                       if($cnt==2)
                                            echo $value;
                                }?>
                        </td>
                        <td class="center"><a href="<?php  echo url('/');  ?>/DeleteSafe/<?php echo $bar->id;?>">Delete</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
