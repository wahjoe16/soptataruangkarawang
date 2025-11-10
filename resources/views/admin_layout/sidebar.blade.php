<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li>
                <a href="{{ route('dashboard') }}" aria-expanded="false">
                    <i class="icon icon-home"></i><span class="nav-text">Beranda</span>
                </a>
            </li>
            @if (Auth::user()->level == "Admin")
                <li>
                    <a href="{{ route('users.index') }}" aria-expanded="false">
                        <i class="icon-user"></i><span class="nav-text">User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('sop.index') }}" aria-expanded="false">
                        <i class="icon icon-app-store"></i><span class="nav-text">SOP</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('activity.index') }}" aria-expanded="false">
                        <i class="icon icon-plug"></i><span class="nav-text">Kegiatan SOP</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->level == "Front Office")
                <li>
                    <a href="{{ route('applications.index') }}" aria-expanded="false">
                        <i class="icon icon-form"></i><span class="nav-text">Permohonan</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->level == "Ketua Tim" || Auth::user()->level == "Kepala Bidang")
                <li>
                    <a href="{{ route('applications.view') }}" aria-expanded="false">
                        <i class="icon icon-form"></i><span class="nav-text">Permohonan Baru</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->level == "Evaluator")
                <li>
                    <a href="{{ route('evaluatorApplication.view') }}" aria-expanded="false">
                        <i class="icon icon-form"></i><span class="nav-text">Permohonan</span>
                    </a>
                </li>
            @endif
            
        </ul>
    </div>


</div>