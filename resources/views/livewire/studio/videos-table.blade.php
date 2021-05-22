<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Thumbnail
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($videos as $video)
                        <tr>
                            <td class="px-6 py-4">
                                <img class="h-20 w-20 rounded-lg"
                                     src="{{ $video->video_thumbnail_url }}"
                                     alt="">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-gray-900">{{ $video->title }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if((int)$video->process_progress_percentage === 100 )
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                  Ready To Watch
                                </span>
                                @else
                                    <span
                                        wire:poll
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                  Processing: {{ $video->process_progress_percentage }}%
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                    <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
