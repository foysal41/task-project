<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('All Tasks') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('All task of current Users ') }}
        </p>
    </header>

        <div class="mt-6">
            <ul class="space-y-4">
                @forelse($tasks as $task)
                    <li class="flex items center justify-between">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">
                                {{ $task->name }}
                            </h3>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ $task->status }}
                            </p>
                        </div>
                        <div>
                            <form action="{{ route('tasks.destroy', $task) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </div>
                    </li>
                    @empty
                    <li>
                        <p class="text-sm text-gray-600">
                            {{ __('No tasks found.') }}
                        </p>
                    </li>
                    @endforelse
            </ul>
        </div>
</section>