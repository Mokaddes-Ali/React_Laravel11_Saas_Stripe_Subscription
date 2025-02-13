<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Package;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::factory()->create([
            'name' => 'Mokaddes Ali',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        Feature::factory()->create([
            'image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMwAAADACAMAAAB/Pny7AAAAh1BMVEU8v7H////z8/UREiQ/Pz/q6usDBhwxva7/+Pr79vmAz8VjyL3y8/MQCyD39PYVLzI4sKTz+vkAt6fW8OxSw7fm7+/m9fNGQkLd8vBtyr/O7Oi25N93zsSX2NCl3daJ0sm84d7B6uPP4N662dap086LyMEnNzfS6Ofc5eWbzch1wbphvLM1PDqY/+gEAAAIwklEQVR4nN2dW5ujNgyGDd1WSUhpOYSGcAjZU2YP///31ZBJJiTG2Mxnm0EXe7G7QN7Hsi1LssQ8bdmnxIwLpSf9X8Z0H4jK2AILp4nzzDBMVJAVlA6H6sggTJRsrKF0OMFBC0cHJqttzJYeDat0dE0Dhg+LZZYWJ9cYHGWYqAjso7Q0qfrMUYXJKuaEpVW14x4Lk5SOUDqc4ICEcaRiN5q0xsE4U7EbDTuiYFysYk84ucIyoADjVsWuQun4jjMOY3ujHBJiozRjMJnr6fImxJL3weznw9LKyBIth5kZC7HTdBgrxzAdGaGRwSTzWMfuhVKZpklg9vNjGaEZhslcmmPDQsHwmjYIk9k9VKoL5YNG9BBMdJwpC6fZDO2eAzBR7fonS4SqATttAOY0rw3mUQYOn2KYZG4bTF+GthshTDTHRfleBoxOIQxy8hPFcfz6B/CtgUjRRDBFjPtozI7NLuSyPdQp0LEbV2owGe6bFDT+au13Eq7W5xI3OrHAEhDAwBYyYrX/SnLlaXArS6wCU6GUjPLzKvT7st7BDAvKx2ESGMtmt/afJPQr0PtZXIzBRDA9KEUsLc0R9AFGj+vzI0yFYgn2QhZOsy1Bn6CNHGYPm5/NSszC5805BX2DDlKYHKZk/uPcf5MVavgft84+TIH5CJfzgJJ1iraDfaYahslQNhmlg0rWDQ3sEJsmgzCwVZNqOUwD22w2QzA4zxKdh2dMq2db2DrTSxe4h4ENDCMZCpc1aj3rD80dDNBNlkqmP3bSsLQRwsD2S75jjsHgXD+0iQQwSP+lRRh25xV8g6mBB0GbMHSMnmCgjmWbMHdDw0wMjF0Yqh5hsJ5luzA37/MV5oR7ObMMw6jow4Bdy5ZhyqwHA3Zh2oW5xTpfYQrsyy3DXD3pzMD0tz8y6f4O5gD2LduGodMbTATdZJgDmIsV0MHATphXsQ3DLok1HUyCjmBYh4mbK0wEdPtfxDrMRc86GJiD6Sr2YbroUwuTweNk1mFYnLzCnNBa5gCmS7VnRkL+DmCCVxh8aNk+TBcS4DB7uJa5gGnDggwaj72Ki5GpOhgDWTIuYIIWJoJ5F9/EAQxjEYfB7zJuYGjPYWAR2TtxARMXHGbqIZMkMg4TS56elohARw4zYf4TxZQGEtmMwVSyp1OKJySJUM5htK3MmPJm52/9rUTkLFyGnwz5q/3mOCExhcNoPkFxdUuHMSfhal3r4sQei/QeoXwrjfDhZBVqToA4Y5nWYkb1WhrgQ0q4arSWgvjA9FbmJrTG0uJoJUFRwbQOM4VNlI5GY2yoZhrbDFVbyzC+r5FmQUem7jKjfGedJdyprwJUMo0lo7GN0tIc1KdNwJS9zFTaH5g2/0E9CJ4yZWcm1fZRuKwbVZYOR5ElPRjf90USnjXsLWUYJ1rWpUEaOPscx61HMzToEEULUznRMj5pvsJZWqvMDUxY4J0UzmDWjQGYysn8N6RmRzcs/lpnAVD8r3xpdkSjsTSrmj6UyrJ7zYnWpqn8X6l2s2k2yihs9oamxhkg1ToCuIDRODmnWoezFweHM3VHLuUzPzZvNW7y8mOznkPDLkqo69DQcTWRZfeMtqtJywlIrArt7TbrQs8JmLBIMzyTn817mjtZbTWT4OKMeZo2KdFmt3q6sgiWkH+h0nacRxNCGhQH9c5fryQyOnbSp0P/pZhw1zadFmxiY7eu89HImezpNpY1IdgUtGHAaTFN2dcUwoDSx6f9oDYMaCBBw02A9tTmASwpdG6ifpmzpIZFpZssKxFoISlayYKS5+JseWmNC0k4XWIq8BKStNNrkjZ+cXaYPu8l6Hqs9mEOy7lyQndXTj7+ZaDq7TIQ/AKNy2taH/0CHfUu0H30q431/dVGL8HGDd1eOo2AZRqY9evAm/514EVd1AYXNLV8hX7/AAOsbMRsw9zq7N9g9khr02oNDUHZCWSlFssFQbxnmA9bquUkgAFWNxqvCIQsouOJYBZV3mhRhaeARc1pJDUFVhKsX/K8V6wNVnGaKulVjhBXrK3X/aQHAyttTPJJA5v/V9tfBIMzA6iRFjiEDUy/yc5D6UnYKlPKpj/KhSovPentMV/hMjw06zOq7vBIUVBYMa3hXLtwl2M+8TD7BTCw3jlUZuJCuluYkrHH0uDmShyzjYhmvYMVBY5Pj7/9ufh0DaMRFZ8+o0oCP9cEFpYFx8We0iLsbZ6rdYGrO0rP9eeFBdtB32uXgcJ/HZ1wtfKbAFiwXdDsRFRKHxh84j9+05y33Bo7N8cU6J+PRT3pjDc5YO2tayICNzkQ9nATt59AR5/QIZPnVXkYZn6dpx5F3OtooGXLYd4tWwqdli3LaqaDdj4jhY6abY74bjPXpk23qpkaMLNtDTbcTEvatA2eHgAQWZszaTu9Gbagm9xOb4Y0cpaRFpTZvDZPGmmoOdIcdFY0YyyjbVsNZNZNFaKxztofqKGu4DSmDTOXVscKv1SlCfUcLBvBiX8ajKd3KccEChP1aJsG453cThxKnxpnvQOGG2ruBocoH1mSNWG8rHI1OMQGTf6pMF5UuLE7uYop9J/XhOGWWmVf1YhKRRXThOGDY1vViNWqKqYLwwdnSqm+d7CUB2UV04fxolNq4FbXAMqQEwYF03o6gP1KZSix8iI2HaaNSZvHoZiNmcgYGM87ILvJClFIbctHwBi2b4hELn5zMJ3xaYSHv3UiyjtgOE6A30SJpQOtvw3DcGUrkfEjPihprrsa42D4UnAMQOrG3xIcNUwXAzDcnK43AB6uXpt6wmIMhuH7TlJvUprOwx/lJHqGizEYLtGh7vRNG4g67YKQeCgYrx2f4jJA6kVvLkPSJBgSDwjDJcqSdoQoHkPqos/ER+SUZDASDwvTCSdKiqpMLwXdRRj8L8uqPnAOJEgr7E8j8vLy+cvXH99+/vq3J79+fvvx9cvnzy9/vpj4KvtkQv7j8un379/fv//Tk+/f+V9e/tWEsL8Myt8CMfk99seC5H/syMwLKLw7gAAAAABJRU5ErkJggg==',
            'route_name' => 'feature1.index',
            'name' => 'Feature 1',
            'description' => 'Description of Feature 1',
            'required_credits' => 10,
            'active' => true,
        ]);

        Feature::factory()->create([
            'image' => 'data:image/png;base64,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',
            'route_name' => 'feature2.index',
            'name' => 'Feature 2',
            'description' => 'Description of Feature 2',
            'required_credits' => 5,
            'active' => true,
        ]);

        Package::factory()->create([
            'name' => 'Package 1',
            'price' => 100,
            'credits' => 100,
        ]);

        Package::factory()->create([
            'name' => 'Package 2',
            'price' => 200,
            'credits' => 200,
        ]);

        Package::factory()->create([
            'name' => 'Package 3',
            'price' => 300,
            'credits' => 300,
        ]);

    }
}
