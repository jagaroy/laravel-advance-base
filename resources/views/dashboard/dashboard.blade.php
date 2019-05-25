@extends('aceadminv.app')

@section('content_title')
	<strong> Dashboard</strong>
@endsection

@section('content')

<div class="inner_body">
	
	<div class="row dashboard_body">
        <div class="col-md-3">
        
            <div class="tile-stats tile-red">
                <div class="icon">
                	<i class="ace-icon glyphicon glyphicon-user"></i>                	
                </div>
                <div class="num" data-start="0" data-end="80" 
                		data-postfix="" data-duration="1500" data-delay="0">{{ ($user_count) ? $user_count :0 }}</div>
                
                <h3>Users</h3>
               <p>Total Users</p>
            </div>
            
        </div>
        <div class="col-md-3">
            <a href="{{ url('/categories') }}" title="Categories list">
                <div class="tile-stats tile-green">
                    <div class="icon">
                    	<i class="ace-icon glyphicon glyphicon-heart"></i>
                    </div>
                    <div class="num" data-start="0" data-end="80" 
                    		data-postfix="" data-duration="800" data-delay="0">{{ ($category_count) ? $category_count :0 }}</div>
                    
                    <h3>Categories</h3>
                   <p>Total Categories</p>
                </div>
            </a>            
        </div>
        <div class="col-md-3">
        
            <div class="tile-stats tile-aqua">
                <div class="icon">
                	<i class="ace-icon glyphicon glyphicon-glass"></i>
                </div>
                <div class="num" data-start="0" data-end="80" 
                		data-postfix="" data-duration="500" data-delay="0">{{ ($category_count) ? $category_count :0 }}</div>
                
                <h3>Categories</h3>
               <p>Total Categories</p>
            </div>
            
        </div>
        <div class="col-md-3">
        
            <div class="tile-stats tile-blue">
                <div class="icon">
                	<i class="fa fa-group"></i>
                </div>
                
                <div class="num" data-start="0" data-end="80" 
                		data-postfix="" data-duration="500" data-delay="0">{{ ($category_count) ? $category_count :0 }}</div>
                
                <h3>Categories</h3>
               <p>Total present categories today</p>
            </div>
            
        </div>
	</div>
</div>

@endsection