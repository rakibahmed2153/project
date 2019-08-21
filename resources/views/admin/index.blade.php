@extends('admin.layout.main')

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
                                            <a href="{{route('admin.addscout')}}" class="btn btn-default" data-toggle="tooltip" title="Add Scout"><i class="fa fa-cog"></i></a>
                                            <a href="{{route('admin.scoutlist')}}" class="btn btn-default" data-toggle="tooltip" title="Scout List"><i class="fa fa-th"></i></a>
                                        </div>
                                    </div>
                                    Scout
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                                <div class="dash-tile-text">{{$scout}}</div>
                            </div>
                            
                            <div class="dash-tile dash-tile-leaf clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <span class="dash-tile-options">
                                        
                                        <a href="{{route('admin.profile')}}" class="btn btn-default" data-toggle="tooltip" title="Profile"><i class="fa fa-th"></i></a>
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
                                            <a href="{{route('admin.adduser')}}" class="btn btn-default" data-toggle="tooltip" title="Add User"><i class="fa fa-cog"></i></a>
                                            <a href="{{route('admin.userlist')}}" class="btn btn-default" data-toggle="tooltip" title="User List"><i class="fa fa-th"></i></a>
                                        </div>
                                    </div>
                                    Users
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                                <div class="dash-tile-text">{{$user}}</div>
                            </div>
                            <!-- END Patient Tile -->

                            
                            <div class="dash-tile dash-tile-fruit clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <a href="{{route('admin.cngpassword')}}" class="btn btn-default" data-toggle="tooltip" title="Change Password"><i class="fa fa-wrench"></i></a>
                                    </div>
                                    Change Password
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-cloud-download"></i></div>
                                <div class="dash-tile-text">Password</div>
                            </div> 
                        </div>
                        <!-- END Column 2 of Row 1 -->

                        <!-- Column 3 of Row 1 -->
                        <div class="col-sm-3">
                            <!-- Department Tile -->
                            <div class="dash-tile dash-tile-oil clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <div class="btn-group">
                                            
                                            <a href="{{route('admin.placereqlist')}}" class="btn btn-default" data-toggle="tooltip" title="Place Request List"><i class="fa fa-th"></i></a>
                                        </div>
                                    </div>
                                   Place Publish Request
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-hdd-o"></i></div>
                                <div class="dash-tile-text">{{$place}}</div>
                            </div>

                            <!--                             <div class="dash-tile dash-tile-dark clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <a href="" class="btn btn-default" data-toggle="tooltip" title="Profile"><i class="fa fa-th"></i></a>
                                    </div>
                                    Manage Profile
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-hdd-o"></i></div>
                                <div class="dash-tile-text">Profile</div>
                            </div>
                             -->
                        </div>
                        <!-- END Column 3 of Row 1 -->

                        <!-- Column 4 of Row 1 -->
                        <div class="col-sm-3">
                            <!-- Admin Tile -->
                            <div class="dash-tile dash-tile-balloon clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <a href="{{route('admin.requestlist')}}" class="btn btn-default" data-toggle="tooltip" title="Request List"><i class="fa fa-th"></i></a>
                                    </div>
                                    Request List
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                                <div class="dash-tile-text">{{$reqest}}</div>
                            </div>
                            <!-- END Admin Tile -->

                             

                            <!-- 
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
                             -->
                        </div>
                        <!-- END Column 4 of Row 1 -->
                    </div>
                    <!-- END Row 1 -->

                   
                    
@endsection