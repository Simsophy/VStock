
    <div id="sidebar">
        <h3 class="text-center py-3 border-bottom border-secondary">
            <i class="bi bi-gear-fill me-2"></i>  Admin dasboard
        </h3>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action active">
                <i class="bi bi-house-door-fill me-2"></i> Dashboard
            </a>
         <!-- Product List -->
    <a href="#" 
       class="list-group-item list-group-item-action {{ request()->routeIs('product.*') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-text-fill me-2"></i> Product
    </a>


            <a href="{{route('user.index')}}" class="list-group-item list-group-item-action">
                <i class="bi bi-person-fill me-2"></i> Users
            </a>
            <a href="{{route('social.index')}}" class="list-group-item list-group-item-action">
                <i class="bi bi-person-fill me-2"></i> Socials
            </a>
            <a href="{{route('menu.index')}}" class="list-group-item list-group-item-action">
                <i class="bi bi-person-fill me-2"></i> Menus
            </a>
          <a href="{{ route('company.index') }}"
   class="list-group-item list-group-item-action {{ request()->routeIs('company.index') ? 'active' : '' }}">
    <i class="bi bi-building me-2"></i> Company
</a>

            <a href="{{route('setting.index')}}" class="list-group-item list-group-item-action">
                <i class="bi bi-gear-fill me-2"></i> Settings
            </a>
        </div>
    </div>


