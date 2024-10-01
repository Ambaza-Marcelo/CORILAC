 <!-- sidebar menu area start -->
 @php
     $usr = Auth::guard('admin')->user();
 @endphp
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h2 class="text-white">CORILAC</h2> 
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                    @if ($usr->can('dashboard.view'))
                    <li class="active">
                        <a href="{{ route('admin.dashboard') }}" aria-expanded="true"><i class="ti-dashboard"></i><span>@lang('messages.dashboard')</span></a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ route('admin.roles.index') }}" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            @lang('messages.roles') & @lang('messages.permissions')
                        </span></a>
                    </li>

                    
                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="{{ route('admin.admins.index') }}" aria-expanded="true"><i class="fa fa-user"></i><span>
                            @lang('messages.users')
                        </span></a>
                    </li>
                    @endif
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class=""></i><span>
                            @lang('Votre banque')
                        </span></a>
                        <ul class="collapse">
                            <li class=""><a href="{{ route('admin.historiques.index')}}">@lang('Historique')</a></li>
                            <li class=""><a href="">@lang('Profil')</a></li>
                            <li class=""><a href="{{ route('admin.actionnariat.index')}}">@lang('Actionnariat')</a></li>
                            <li class=""><a href="{{ route('admin.vision.index')}}">@lang('Vision')</a></li>
                            <li class=""><a href="{{ route('admin.responsabilite.index')}}">@lang('Responsabilité')</a></li>
                            <li class=""><a href="">@lang('Nos agences')</a></li>
                            <li class=""><a href="">@lang('Rapport annuel')</a></li>
                            <li class=""><a href="">@lang('Etat Financier')</a></li>
                            <li class=""><a href="{{ route('admin.tarif.index')}}">@lang('Tarif')</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class=""></i><span>
                            @lang('Comptes')
                        </span></a>
                        <ul class="collapse">
                            <li class=""><a href="{{ route('admin.accounts.index')}}">@lang('Compte')</a></li>
                            <li class=""><a href="{{ route('admin.compte_courant.index')}}">@lang('Compte courant')</a></li>
                            <li class=""><a href="{{ route('admin.compte_devise.index')}}">@lang('Compte devise')</a></li>
                            <li class=""><a href="{{ route('admin.compte_conjoint.index')}}">@lang('Compte conjoint')</a></li>
                            <li class=""><a href="">@lang('Compte Etudiant')</a></li>
                            <li class=""><a href="">@lang('Compte épargne junior')</a></li>
                            <li class=""><a href="">@lang('Compte épargne')</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class=""></i><span>
                            @lang('Services digitaux')
                        </span></a>
                        <ul class="collapse">
                            <li class=""><a href="{{ route('admin.coricash.index')}}">@lang('Coricash')</a></li>
                            <li class=""><a href="{{ route('admin.sms_banking.index')}}">@lang('Sms banking')</a></li>
                            <li class=""><a href="">@lang('Ecocash')</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class=""></i><span>
                            @lang('Crédits')
                        </span></a>
                        <ul class="collapse">
                            <li class=""><a href="{{ route('admin.credits.index')}}">@lang('Crédit')</a></li>
                            <li class=""><a href="{{ route('admin.decouvert.index')}}">@lang('Découvert')</a></li>
                            <li class=""><a href="">@lang('Crédit groupe')</a></li>
                            <li class=""><a href="">@lang('Crédit salarié')</a></li>
                            <li class=""><a href="">@lang('Crédit commercial')</a></li>
                            <li class=""><a href="">@lang('Crédit scolaire')</a></li>
                            <li class=""><a href="">@lang('Crédit agricole')</a></li>
                            <li class=""><a href="">@lang('Crédit logement k\'umuhana')</a></li>
                            <li class=""><a href="">@lang('Crédit artisinal')</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class=""></i><span>
                            @lang('Site')
                        </span></a>
                        <ul class="collapse">
                            <li class=""><a href="{{ route('admin.services.index')}}">@lang('Services')</a></li>
                            <li class=""><a href="{{ route('admin.sliders.index')}}">@lang('Slider')</a></li>
                            <li class=""><a href="{{ route('admin.abouts.index')}}">@lang('A propos')</a></li>
                            <li class=""><a href="{{ route('admin.subscribers.index')}}">@lang('Abonnés')</a></li>
                            <li class=""><a href="{{ route('admin.comments.index')}}">@lang('Commentaires')</a></li>
                            <li class=""><a href="{{ route('admin.categories.index') }}">@lang('Categories')</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class=""></i><span>
                            @lang('Publications')
                        </span></a>
                        <ul class="collapse">
                            <li class=""><a href="{{ route('admin.newsletter.index')}}">@lang('Newsletter')</a></li>
                            <li class=""><a href="{{ route('admin.appels_offres.index')}}">@lang('Appels d\'offres')</a></li>
                            <li class=""><a href="{{ route('admin.actualites.index')}}">@lang('Actualités')</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.settings.index')}}" aria-expanded="true"><span>
                            @lang('Paramètres')
                        </span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->