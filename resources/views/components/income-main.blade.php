<x-main>
    {{$slot}}
    <div class="flex flex-wrap justify-center">
        <table class="w-full border-collapse border border-slate-400 table-auto">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <th>
                    <h1 class="text-2xl p-4">Incomes</h1>
                </th>
            </thead>
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <tr>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">id</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">Income Category</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">Description</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">Date</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">Amount</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">Payment Method</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($incomes as $income)
                <tr>
                    <td class="p-3 ">{{$loop->iteration}}</td>
                    <td class="p-3 text-sm text-gray-700 content-center m-2 ">
                        <span class="col-span-2">{{$income->income_category->name}}</span>
                    </td>
                    <td class=" p-3 text-sm text-gray-700">
                        {{$income->description}}
                    </td>
                    <td class="p-3 text-sm text-gray-700">{{$income->entry_date}}</td>
                    <td class="p-3 text-sm text-gray-700">{{$income->amount}}</td>
                    <td class="p-3 text-sm text-gray-700">{{$income->payment->name}}</td>
                    <td class="p-3 text-sm text-gray-700">
                        <a href="{{route('editIncome', $income->id)}}" class="bg-yellow-200 
                        text-yellow-800 p-2 
                        text-center
                        text-sm
                        rounded-full
                        uppercase
                        hover:bg-yellow-400 
                        transition-all 
                        duration-500">Edit</a>
                    </td>
                    <td class=" p-3 text-sm text-gray-700">
                        <form action="{{route('deleteIncome', $income->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-200 
                            text-red-800 p-2 
                            text-center
                            text-sm
                            rounded-full
                            uppercase
                            hover:bg-red-400 
                            transition-all 
                            duration-500">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <h1 class="p-3 text-2xl text-red-700">No Incomes Yet</h1>
                @endforelse

            </tbody>
        </table>
    </div>
</x-main>