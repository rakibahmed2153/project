@extends('user.layout.main')

@section('Active')
  Dashboard
@endsection


@section('Name')
   Dashboard
@endsection

@section('Iteams')
               


<!-- Tiles -->
                    <!-- Row 1 -->
                    <div class="dash-tiles row">
                        <!-- Column 1 of Row 1 -->
                        <div class="col-sm-3">
                            
                            <div class="dash-tile dash-tile-ocean clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <div class="btn-group">
                                            <a href="{{route('user.showpublishedplace')}}" class="btn btn-default" data-toggle="tooltip" title="Place List"><i class="fa fa-th"></i></a>
                                        </div>
                                    </div>
                                    Places
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                                <div class="dash-tile-text">{{$place}}</div>
                            </div>
                            
                            <div class="dash-tile dash-tile-leaf clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <span class="dash-tile-options">
                                        
                                        <a href="{{route('user.profile')}}" class="btn btn-default" data-toggle="tooltip" title="Profile"><i class="fa fa-th"></i></a>
                                    </span>
                                    Profile
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                                <div class="dash-tile-text">Profile</div>
                            </div>
                            

                            <!-- 
                            <div class="dash-tile dash-tile-leaf clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <span class="dash-tile-options">
                                        <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-content="$500 (230 Sales)" title="Add Service"><i class="fa fa-cog"></i></a>
                                        <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-content="$500 (230 Sales)" title="Service List"><i class="fa fa-th"></i></a>
                                    </span>
                                    Services
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                                <div class="dash-tile-text"></div>
                            </div> -->
                        </div>
                        <!-- END Column 1 of Row 1 -->

                        <!-- Column 2 of Row 1 -->
                        <div class="col-sm-3">
                            <!-- Patient Tile -->
                            <div class="dash-tile dash-tile-flower clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <div class="btn-group">
                                            <a href="{{route('admin.cngpassword')}}" class="btn btn-default" data-toggle="tooltip" title="Change Password"><i class="fa fa-wrench"></i></a>
                                        </div>
                                    </div>
                                    Change Password
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                                <div class="dash-tile-text">Password</div>
                            </div>
                        
                            <!-- END Patient Tile -->

                            
                             <div class="dash-tile dash-tile-fruit clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <a href="{{route('user.wishlist')}}" class="btn btn-default" data-toggle="tooltip" title="Wish List"><i class="fa fa-wrench"></i></a>
                                    </div>
                                    Wish List
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-cloud-download"></i></div>
                                <div class="dash-tile-text"></div>
                            </div>
                            </div>
                            <!-- 
                        </div>
                        <div class="col-sm-3">
                            <div class="dash-tile dash-tile-oil clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <div class="btn-group">
                                            
                                            <a href="" class="btn btn-default" data-toggle="tooltip" title="Scout Request List"><i class="fa fa-th"></i></a>
                                        </div>
                                    </div>
                                    Scout Request
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-hdd-o"></i></div>
                                <div class="dash-tile-text"></div>
                            </div>

                                                        <div class="dash-tile dash-tile-dark clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <a href="" class="btn btn-default" data-toggle="tooltip" title="Profile"><i class="fa fa-th"></i></a>
                                    </div>
                                    Manage Profile
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-hdd-o"></i></div>
                                <div class="dash-tile-text">Profile</div>
                            </div>
                            
                        </div>
                        <div class="col-sm-3">
                            <div class="dash-tile dash-tile-balloon clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <a href="" class="btn btn-default" data-toggle="tooltip" title="Request List"><i class="fa fa-th"></i></a>
                                    </div>
                                    Request List
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                                <div class="dash-tile-text"></div>
                            </div>
                            
                            <div class="dash-tile dash-tile-doll clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <a href="" class="btn btn-default" data-toggle="tooltip" title="Change Password"><i class="fa fa-wrench"></i></a>
                                    </div>
                                    Change Password
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-wrench"></i></div>
                                <div class="dash-tile-text">Password</div>
                            </div>
                             
                        </div> -->
                        <!-- END Column 4 of Row 1 -->
                    </div>
                    <!-- END Row 1 -->

                   
                    
@endsection