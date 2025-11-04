@extends('layouts.master')

@section('page_title')
Settings

@endsection
@section('content')
<div class="row">
    <div class="col-sm-6">
        <ul>
            <li>
                <a href="user.index" class="nav nav-link">
                    <i class="fas fa-angle-right">
                        User Manager
                    </i>
                </a>
            </li>
            <li> 
                 <a href="#" class="nav nav-link">
                    <i class="fas fa-angle-right">
                       Role Manager
                    </i>
                </a>
            </li>
            <li>
                 <a href="company.index" class="nav nav-link">
                    <i class="fas fa-angle-right">
                        Company Manager
                    </i>
                </a>
            </li>
             <li>
                 <a href="social.index" class="nav nav-link">
                    <i class="fas fa-angle-right">
                       Socials
                    </i>
                </a>
            </li>
            <li>
                 <a href="menu.index" class="nav nav-link">
                    <i class="fas fa-angle-right">
                       Menus
                    </i>
                </a>
            </li>

        </ul>
    </div>
</div>


@endsection