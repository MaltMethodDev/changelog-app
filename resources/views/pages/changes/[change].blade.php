<?php

use function Laravel\Folio\name;

name('changes.show');

?>

<div>
    <ul class="divide-y divide-gray-300">
        <x-card>
            <section>
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <div class="flex flex-wrap items-center justify-between -mt-4 -ml-4 sm:flex-nowrap">
                        <div class="mt-4 ml-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="w-12 h-12 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                </div>

                                <div class="ml-4">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900">Tom Cook</h3>
                                    <p class="text-sm text-gray-500">
                                        <a href="#">@tom_cook</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        @auth
                            <div class="flex flex-shrink-0 mt-4 ml-4">
                                <a href="{{ route('filament.admin.resources.changes.edit', $change) }}" class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                    <x-tabler-edit class="-ml-0.5 mr-1.5 h-5 w-5 text-gray-400" />
                                    <span>Edit</span>
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>

                <div class="p-4 prose-sm prose max-w-none sm:p-6">
                    <h2>{{ $change->title }}</h2>

                    {!! $change->body !!}
                </div>
            </section>
        </x-card>
    </ul>

    {{ $changes->links() }}
</div>
