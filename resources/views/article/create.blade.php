<x-layout>

    <div class="container-fluid bodyCreate">
        <x-navbar />

        <div class="row text-center py-2">
            <div class="col-12">
                <h1>{{__('ui.create_article')}}</h1>
            </div>
        </div>
        <div class="row justify-content-center mediaCreate py-4">

            <div class="col-12 col-md-5 boxCreate">
                <livewire:create-article
                :categories="$categories" />
            </div>
        </div>
    </div>

    <x-footer />
</x-layout>