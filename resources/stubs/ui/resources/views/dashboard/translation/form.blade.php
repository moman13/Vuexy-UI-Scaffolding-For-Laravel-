<div >
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Add New Language</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- users edit start -->


        <section class="users-edit">
            <div class="card">
                <div class="card-content" >
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item">
                            </li>
                        </ul>
                        <div>
                            <x-input.normal name="currantLang" title="اسم اللغة "></x-input.normal>
                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">

                                <x-button dusk="profile_update" wire:click="create_new_lang_directory" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1" title="{{__('lang.save')}}"></x-button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

</div>