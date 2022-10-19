<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-3/5 bg-white shadow-lg">
            <div class="flex justify-between p-4">
                <div>
                    <h1 class="text-3xl italic font-extrabold tracking-widest text-indigo-500">Foodie</h1>

                </div>
                <div class="p-2">
                    <ul class="flex">
                        <li class="flex flex-col items-center p-2 border-l-2 border-indigo-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                            <span class="text-sm">
                                www.foodie.com
                            </span>
                            <span class="text-sm">
                                www.lorememhh.com
                            </span>
                        </li>
                        <li class="flex flex-col p-2 border-l-2 border-indigo-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm">
                                2821 Kensington Road,Avondale Estates, GA 30002 USA
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full h-0.5 bg-indigo-500"></div>
            <div class="flex justify-between p-4">
                <div>
                    <h6 class="font-bold">Order Date: <span class="text-sm font-medium">
                            {{ $user->orders[0]->created_at }}</span></h6>
                    <h6 class="font-bold">Order ID : <span class="text-sm font-medium">
                            {{ $user->orders[0]->id }}</span></h6>
                </div>
                <div class="w-40">
                    <address class="text-sm">
                        <span class="font-bold"> Billed To : </span>
                        {{ $user->name }}
                        {{ $user->address }}
                        {{ $user->email }}
                    </address>
                </div>
                <div class="w-40">
                    <address class="text-sm">
                        <span class="font-bold">Ship To :</span>
                        Joe doe
                        800 Folsom Ave
                        San Francisco, CA 94107
                        P: + 111-456-7890
                    </address>
                </div>
                <div></div>
            </div>
            <div class="flex justify-center p-4">
                <div class="border-b border-gray-200 shadow">
                    <table class="">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    #
                                </th>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    Product Name
                                </th>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    Quantity
                                </th>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    Rate
                                </th>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    Discount per unit
                                </th>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    Subtotal
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($user->orders as $order)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        1
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ $order->item_name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500">{{ $order->amount }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $order->price_per_unit }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $order->discount_per_unit }}
                                    </td>
                                    <td class="px-6 py-4">
                                        $30
                                    </td>
                                </tr>
                            @endforeach

                            <tr class="">
                                <td colspan="4"></td>
                                <td class="text-sm font-bold">Sub Total</td>
                                <td class="text-sm font-bold tracking-wider"><b>$950</b></td>
                            </tr>
                            <!--end tr-->
                            <tr>
                                <th colspan="4"></th>
                                <td class="text-sm font-bold"><b>Tax Rate</b></td>
                                <td class="text-sm font-bold"><b>$1.50%</b></td>
                            </tr>
                            <!--end tr-->
                            <tr class="text-white bg-gray-800">
                                <th colspan="4"></th>
                                <td class="text-sm font-bold"><b>Total</b></td>
                                <td class="text-sm font-bold"><b>$999.0</b></td>
                            </tr>
                            <!--end tr-->

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="w-full h-0.5 bg-indigo-500"></div>

            <div class="p-4">
                <div class="flex items-center justify-center">
                    Thank you very much for doing business with us.
                </div>
                <div class="flex items-end justify-end space-x-3">
                    <button onclick="window.print()" class="px-4 py-2 text-sm text-green-600 bg-green-100">Print</button>
                    <button class="px-4 py-2 text-sm text-blue-600 bg-blue-100">Save</button>
                </div>
            </div>

        </div>
    </div>
  
</body>



</html>
