<div>
    @livewire('layouts.navbar-rednetve')
    <style>
        .nav-link{
            color: #101c4e !important;
        }        
    </style>
    <main class="main-content">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Perfil</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                            <li class="breadcrumb-item active">Perfil del Usuario</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center" x-data="{ imagePreview: '{{ auth()->user()->avatar_url }}' }">
                                    <input wire:model="image" type="file" class="d-none" x-ref="image" x-on:change="
                                            reader = new FileReader();
                                            reader.onload = (event) => {
                                                imagePreview = event.target.result;
                                                document.getElementById('profileImage').src = `${imagePreview}`;
                                            };
                                            reader.readAsDataURL($refs.image.files[0]);
                                        " />
                                    <img x-on:click="$refs.image.click()" class="profile-user-img img-circle" x-bind:src="imagePreview ? imagePreview : '/backend/dist/img/user4-128x128.jpg'" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                                <p class="text-muted text-center">{{ auth()->user()->rol() }}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card" x-data="{ currentTab: $persist('profile') }">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills" wire:ignore>
                                    <li @click.prevent="currentTab = 'profile'" class="nav-item mx-2"><a class="nav-link" :class="currentTab === 'profile' ? 'active' : ''" href="#profile" data-toggle="tab"><i class="fa fa-user mr-1"></i> Editar Perfil</a></li>
                                    <li @click.prevent="currentTab = 'changePassword'" class="nav-item mx-2"><a class="nav-link" :class="currentTab === 'changePassword' ? 'active' : ''" href="#changePassword" data-toggle="tab"><i class="fa fa-key mr-1"></i> Cambiar Contraseña</a></li>
                                    <li @click.prevent="currentTab = 'changeBasicData'" class="nav-item mx-2">
                                        <a class="nav-link" :class="currentTab === 'changeBasicData' ? 'active' : ''" href="#changeBasicData" data-toggle="tab"><svg width="32px" height="32px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000" stroke="#000000" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M338.358857 510.317714a124.635429 124.635429 0 0 0-115.2 95.085715c-2.779429 11.044571-15.067429 15.798857-25.746286 14.116571-11.629714-1.828571-17.554286-17.188571-13.165714-30.354286 15.579429-47.616 47.323429-84.114286 88.795429-103.862857a112.932571 112.932571 0 0 1 70.948571-200.996571c62.464 0 113.152 50.761143 113.152 113.078857 0 34.523429-15.579429 65.462857-40.009143 86.308571 42.715429 19.090286 75.190857 56.027429 92.672 103.643429 4.827429 13.165714 1.682286 26.258286-9.289143 32.182857a23.332571 23.332571 0 0 1-30.500571-16.091429c-14.628571-56.173714-59.977143-91.209143-117.394286-93.257142a114.029714 114.029714 0 0 1-14.262857 0.146285z m586.313143 134.070857V537.453714c0-16.384 15.067429-29.403429 32.548571-29.403428a29.257143 29.257143 0 0 1 30.208 29.403428v133.193143a109.714286 109.714286 0 0 1-109.714285 109.714286H172.690286c-75.044571 0-136.118857-55.588571-136.118857-124.342857V170.569143A109.714286 109.714286 0 0 1 146.285714 60.854857L851.236571 60.708571c75.117714 0 136.192 55.588571 136.192 124.416l-0.146285 213.577143c-0.512 15.872-13.165714 27.282286-30.061715 27.282286-17.042286 0-31.963429-11.410286-32.548571-27.428571l-0.219429-213.430858c0-36.132571-32.914286-61.366857-73.142857-61.366857H172.617143a73.142857 73.142857 0 0 0-73.142857 73.142857V656.091429c0 36.059429 32.914286 61.513143 73.142857 61.513142h678.838857a73.142857 73.142857 0 0 0 73.142857-73.142857zM344.064 333.750857a63.707429 63.707429 0 0 0 0 127.268572 63.707429 63.707429 0 0 0 0-127.268572z m440.32 283.209143H618.057143c-19.529143 0-35.84-12.434286-35.84-28.525714s16.310857-28.452571 35.84-28.452572h166.180571c19.602286 0 35.84 12.361143 35.84 28.525715 0 16.091429-16.310857 28.452571-35.84 28.452571z m0-275.748571H618.057143c-19.529143 0-35.84-12.361143-35.84-28.452572s16.310857-28.452571 35.84-28.452571h166.180571c19.602286 0 35.84 12.361143 35.84 28.525714 0 16.091429-16.310857 28.379429-35.84 28.379429z m0 126.537142H618.057143c-19.529143 0-35.84-12.288-35.84-28.452571 0-16.091429 16.310857-28.452571 35.84-28.452571h166.180571c19.529143 0 35.84 12.361143 35.84 28.525714 0 16.091429-16.237714 28.379429-35.84 28.379428z" fill="#000000"></path></g></svg>Datos Básicos</a></li>
                                    <li @click.prevent="currentTab = 'changeBillingDetails'" class="nav-item mx-2">
                                        <a class="nav-link" :class="currentTab === 'changeBillingDetails' ? 'active' : ''" href="#changeBillingDetails" data-toggle="tab"><svg width="32px" height="32px" viewBox="0 0 32 32" id="svg5" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs id="defs2"></defs> <g id="layer1" transform="translate(36,-148)"> <path d="m -28,150 c -2.749574,0 -5,2.25042 -5,5 v 22 a 1.0001,1.0001 0 0 0 1.832031,0.55469 L -30,175.80273 l 1.167969,1.75196 a 1.0001,1.0001 0 0 0 1.664062,0 L -26,175.80273 l 1.167969,1.75196 a 1.0001,1.0001 0 0 0 1.664062,0 L -22,175.80273 l 1.167969,1.75196 a 1.0001,1.0001 0 0 0 1.664062,0 L -18,175.80273 l 1.167969,1.75196 A 1.0001,1.0001 0 0 0 -15,177 v -12 h 7 a 1.0001,1.0001 0 0 0 1,-1 v -9 c 0,-2.74958 -2.2504259,-5 -5,-5 z m 0,2 h 12.007812 C -16.624083,152.83731 -17,153.87659 -17,155 v 1 8 9.69727 l -0.167969,-0.25196 a 1.0001,1.0001 0 0 0 -1.664062,0 L -20,175.19727 l -1.167969,-1.75196 a 1.0001,1.0001 0 0 0 -1.664062,0 L -24,175.19727 l -1.167969,-1.75196 a 1.0001,1.0001 0 0 0 -1.664062,0 L -28,175.19727 l -1.167969,-1.75196 a 1.0001,1.0001 0 0 0 -1.664062,0 L -31,173.69727 V 155 c 0,-1.6687 1.331303,-3 3,-3 z m 16,0 c 1.668697,0 3,1.3313 3,3 v 8 h -6 v -7 -1 c 0,-1.6687 1.331303,-3 3,-3 z" id="rect1587" style="color:#000000;fill:#000000;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none"></path> <path d="m -28,162 a 1,1 0 0 0 -1,1 1,1 0 0 0 1,1 h 4 a 1,1 0 0 0 1,-1 1,1 0 0 0 -1,-1 z" id="path6019" style="color:#000000;fill:#000000;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none"></path> <path d="m -28,165 a 1,1 0 0 0 -1,1 1,1 0 0 0 1,1 h 8 a 1,1 0 0 0 1,-1 1,1 0 0 0 -1,-1 z" id="path6021" style="color:#000000;fill:#000000;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none"></path> <path d="m -28,168 a 1,1 0 0 0 -1,1 1,1 0 0 0 1,1 h 8 a 1,1 0 0 0 1,-1 1,1 0 0 0 -1,-1 z" id="path6023" style="color:#000000;fill:#000000;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none"></path> <path d="m -28,155 a 1.0001,1.0001 0 0 0 -1,1 v 4 a 1.0001,1.0001 0 0 0 1,1 h 4 a 1.0001,1.0001 0 0 0 1,-1 v -4 a 1.0001,1.0001 0 0 0 -1,-1 z m 1,2 h 2 v 2 h -2 z" id="rect6025" style="color:#000000;fill:#000000;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none"></path> </g> </g></svg> Facturación</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="tab-pane" :class="currentTab === 'profile' ? 'active' : ''" id="profile" wire:ignore.self>
                                        <form wire:submit.prevent="updateProfile" class="form-horizontal">

                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Usuario</label>
                                                <div class="col-sm-10">
                                                    <input wire:model.defer="state.name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Usuario">
                                                    @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="identificationNac"class="col-sm-2 col-form-label">Tipo </label>                                                    
                                                <div class="col-sm-10">
                                                    <select wire:model.defer="state.identificationNac" class="form-control @error('identificationNac') is-invalid @enderror" name="identificationNac" id="identificationNac" placeholder="Tipo">
                                                        <option value="J">J-</option>
                                                        <option value="E">E-</option>
                                                        <option value="G">G-</option>
                                                        <option value="P">P-</option>
                                                        <option value="V" selected>V-</option>
                                                    </select>
                                                    @error('identificationNac')
                                                    <div class="invalid-feedback">
                                                        {{ $message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="identificationNumber" class="col-sm-2 col-form-label">Documento</label>
                                                <div class="col-sm-10">
                                                    <input type="text" wire:model.defer="state.identificationNumber" class="form-control @error('identificationNumber') is-invalid @enderror" name="identificationNumber" id="identificationNumber" placeholder="Documento">
                                                    @error('identificationNumber')
                                                    <div class="invalid-feedback">
                                                        {{ $message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="names" class="col-sm-2 col-form-label">Nombres</label>
                                                <div class="col-sm-10">
                                                    <input wire:model.defer="state.names" type="text" class="form-control @error('names') is-invalid @enderror" id="inputNames" placeholder="Nombres">
                                                    @error('names')
                                                    <div class="invalid-feedback">
                                                        {{ $message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="surnames" class="col-sm-2 col-form-label">Apellidos</label>
                                                <div class="col-sm-10">
                                                    <input wire:model.defer="state.surnames" type="text" class="form-control @error('surnames') is-invalid @enderror" id="inputSurName" placeholder="Apellidos">
                                                    @error('surnames')
                                                    <div class="invalid-feedback">
                                                        {{ $message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input wire:model.defer="state.email" type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Email">
                                                    @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-app"><i class="fa fa-save mr-1"></i> Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane" :class="currentTab === 'changePassword' ? 'active' : ''" id="changePassword" wire:ignore.self>
                                        <form wire:submit.prevent="changePassword" class="form-horizontal">
                                            <div class="form-group row">
                                                <label for="currentPassword" class="col-sm-3 col-form-label">Contraseña actual</label>
                                                <div class="col-sm-9">
                                                    <input wire:model.defer="state.current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" id="currentPassword" placeholder="Contraseña actual">
                                                    @error('current_password')
                                                    <div class="invalid-feedback">
                                                        {{ $message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newPassword" class="col-sm-3 col-form-label">Nueva Contraseña</label>
                                                <div class="col-sm-9">
                                                    <input wire:model.defer="state.password" type="password" class="form-control @error('password') is-invalid @enderror" id="newPassword" placeholder="Nueva Contraseña">
                                                    @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="passwordConfirmation" class="col-sm-3 col-form-label">Confirme la Contraseña</label>
                                                <div class="col-sm-9">
                                                    <input wire:model.defer="state.password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="passwordConfirmation" placeholder="Confirme la Contraseña">
                                                    @error('password_confirmation')
                                                    <div class="invalid-feedback">
                                                        {{ $message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-3 col-sm-9">
                                                    <button type="submit" class="btn btn-app"><i class="fa fa-save mr-1"></i> Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane" :class="currentTab === 'changeBasicData' ? 'active' : ''" id="changeBasicData" wire:ignore.self>
                                        @livewire('admin.profile.basic-data', ['user_id' => auth()->user()->id ])
                                    </div>

                                    <div class="tab-pane" :class="currentTab === 'changeBillingDetails' ? 'active' : ''" id="changeBillingDetails" wire:ignore.self>
                                        @livewire('admin.profile.billing-details', ['user_id' => auth()->user()->id ])
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </main>
    @livewire('layouts.footer-rednetve')
</div>

@push('styles')
<style>
    .profile-user-img:hover {
        background-color: blue;
        cursor: pointer;
    }
</style>
@endpush

@push('alpine-plugins')
<!-- Alpine Plugins -->
<script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
@endpush

@push('js')
<script>
    $(document).ready(function () {
        Livewire.on('nameChanged', (changedName) => {
            $('[x-ref="username"]').text(changedName);
        })
    });
</script>
@endpush
