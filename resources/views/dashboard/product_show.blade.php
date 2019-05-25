@extends('aceadminv.app')

@section('content_title')
    <strong> Product Show</strong>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
        </div>
    </div>
</div>

<!-- #section:pages/profile.info -->
    <div class="profile-user-info profile-user-info-striped">
        <div class="profile-info-row">
            <div class="profile-info-name"> Product Name : </div>
            <div class="profile-info-value">
                <span >{{ $product->product_name}}</span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Description : </div>
            <div class="profile-info-value">
                <span >{{ $product->product_desc}}</span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Category Name : </div>
            <div class="profile-info-value">
                <span >{{ $product->cat_name}}</span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Brand Name : </div>
            <div class="profile-info-value">
                <span >{{ $product->brand_name}}</span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Store Name : </div>
            <div class="profile-info-value">
                <span >{{ $product->store_name}}</span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Product Status : </div>
            <div class="profile-info-value">
                <span >{{ $product->product_status ? 'Active':'Inactive'}}</span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Product Quantity : </div>
            <div class="profile-info-value">
                <span >{{ $product->product_qty.' '.$product->unit_type }}</span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Product Price : </div>
            <div class="profile-info-value">
                <span >{{ $product->product_price}}</span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Product Image : </div>
            <div class="profile-info-value">
                <span >
                    <img src="{{ url('/files/images/').'/'.$product->product_image}}" alt="Product Image" class="img-responsive product_image" />
                </span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Created At : </div>
            <div class="profile-info-value">
                <span >{{ $product->created_at}}</span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Updated At : </div>
            <div class="profile-info-value">
                <span >{{ $product->updated_at}}</span>
            </div>
        </div>
        
    </div>


@endsection