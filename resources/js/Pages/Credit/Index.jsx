// import React from 'react'
// import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
// import { Head } from '@inertiajs/react'
// import CreditPricingCards from '@/Components/CreditPricingCards'
// import coin from '../../../../public/build/assets/gold-coin-money-symbol-icon-png.webp'

// export default function Index({auth, packages, features, success, error})
// {
//     const availableCredits = auth.user.available_credits;

//     return(
//          <AuthenticatedLayout
//                     header={
//                         <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
//                             Credit Pricing Cards
//                         </h2>
//                     }
//                 >
//                 <Head title="Your Credits" />

//                 <div className="py-12">
//                     <div className="max-w-7xl  mx-auto sm:px-6 lg:px-8">
//                         {success && <div className='rounded-lg bg-emerald-500 text-gray-100 p-3 mb-4'>
//                             {success}
//                         </div>

//                         }

// {error && <div className='rounded-lg bg-red-500 text-gray-100 p-3 mb-4'>
//                             {error}
//                         </div>

//                         }
//                           <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg relative ">
//                             <div className="flex flex-col gap-3 items-center p-4">
//                             <img src={coin} className="w-[100px]" alt="Coin Image.png" />
//                             <h3 className='text-white text-2xl'>
//                             You have {availableCredits} Credits
//                             </h3>
//                             </div>
//                             </div>
//                             <CreditPricingCards packages={packages.data} features={features.data} />

//                     </div>

//                 </div>

//         </AuthenticatedLayout>
//     )

// }


import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import CreditPricingCards from '@/Components/CreditPricingCards';
import coin from '../../../../public/build/assets/gold-coin-money-symbol-icon-png.webp'

export default function Index({ auth, packages, features, success, error }) {
    const availableCredits = auth?.user?.available_credits ?? 0;

    // Safe handling of undefined data
    const safePackages = packages?.data ?? [];
    const safeFeatures = features?.data ?? [];

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Credit Pricing Cards
                </h2>
            }
        >
            <Head title="Your Credits" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {success && (
                        <div className="rounded-lg bg-emerald-500 text-gray-100 p-3 mb-4">
                            {success}
                        </div>
                    )}

                    {error && (
                        <div className="rounded-lg bg-red-500 text-gray-100 p-3 mb-4">
                            {error}
                        </div>
                    )}

                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg relative">
                    <div className="flex flex-col gap-3 items-center p-4">
                          <img src={coin} className="w-[150px]" alt="Coin Image.png" />
                            <h3 className='text-black text-2xl'>
                           You have {availableCredits} Credits
                        </h3>
                            </div>
                    </div>

                    <CreditPricingCards packages={safePackages} features={safeFeatures} />
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
