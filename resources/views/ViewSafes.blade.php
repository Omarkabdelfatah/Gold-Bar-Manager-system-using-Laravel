@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new Safe') }}</div>

                <div class="card-body">
                    <form method="POST" action="<?php  echo url('/');  ?>/CreateSafe">
                        @csrf

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
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('Country name') }}</label>

                            <div class="col-md-6">                                
                                <select name="country_id" id="country_id" class="form-control" required autofocus>
                                <?php foreach($countries as $country) { ?>
                                    <option value="{{$country->id}}"><?php echo $country->name;?></option>
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
                <h4>List of Safes</h4>
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Country</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($safes as $safe){ ?>
                    <tr>
                        <td><?php echo $safe->name;?></td>
                        <td scope="row"><?php if($safe->type == 0){
                            echo "Internal";
                        }
                        else{
                            echo "External";
                        }?></td>
                        <td> <?php 
                            $safes1 = App\Safe::find($safe->id)->country;
                                    $cnt = 0;
                             foreach( $safes1->toArray() as $key => $value )
                                {
                                       $cnt++;
                                       if($cnt==2)
                                            echo $value;
                                }?>
                        </td>
                        <td class="center"><a href="<?php  echo url('/');  ?>/DeleteSafe/<?php echo $safe->id;?>">Delete</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
