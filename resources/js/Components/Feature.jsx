// import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
// import React from 'react'
// import {Head, Link,usePage} from '@inertiajs/react'


// export default function Feature({feature, answer, children}){
//     const {auth} = usePage().props


//     const availableCredits = auth.user.available_credits;

//   return (
//     <>
//     <AuthenticatedLayout>
//         user={auth.user}
//         header ={
//             <h2 className='font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight'>
//                 {feature.name}
//             </h2>
//         }

//         <Head title='feature 1'/>

//         <div className="py-12">
//             <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
//                     {answer !== null && (
//                     <div className="py-3 mb-3 px-5 rounded text-white">
//                                Result of Calculation: {answer}
//                     </div>
//                         )}
//                     <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg relative">
//                         {availableCredits !== null &&
//                         feature.required_credits > availableCredits &&
//                          (
//                             <div className="absolute left-0 top-0 right-0 bottom-0 z-20 flex flex-col items-center justify-center bg-white/70 gap-3 text-red-500">

//                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
//   <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
// </svg>

// <div className="">

// You do not have enough credits to use this feature. Go{""}
// <Link href="/" className="text-blue-500 underline">Buy More Credits</Link>
//                             </div>

//                             </div>

//                         )}
//                         <div className="p-8 text-gray-400 border-b pb-4">
//                             <p>{feature.description}</p>
//                             <p className="text-sm italic font-semibold">
//                                 Requires {feature.required_credits} credits
//                             </p>
//                         </div>
//                         {children}
//                 </div>
//             </div>
//         </div>

//     </AuthenticatedLayout>
//     </>
//   )
// }


import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import React from "react";
import { Head, Link, usePage } from "@inertiajs/react";

export default function Feature({ feature, answer, children }) {
    const { auth } = usePage().props;
    const availableCredits = auth.user.available_credits;

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Feature 1" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {feature.name}
                    </h2>

                    {answer !== null && (
                        <div className="py-3 mb-3 px-5 rounded text-white bg-green-500">
                            Result of Calculation: {answer}
                        </div>
                    )}

                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg relative">
                        {availableCredits !== null &&
                            feature.required_credits > availableCredits && (
                                <div className="absolute left-0 top-0 right-0 bottom-0 z-20 flex flex-col items-center justify-center bg-white/70 gap-3 text-red-500">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        strokeWidth={1.5}
                                        stroke="currentColor"
                                        className="w-6 h-6"
                                    >
                                        <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"
                                        />
                                    </svg>

                                    <div>
                                        You do not have enough credits to use this feature.{" "}
                                        <Link href="/" className="text-blue-500 underline">
                                            Buy More Credits
                                        </Link>
                                    </div>
                                </div>
                            )}

                        <div className="p-8 text-gray-400 border-b pb-4 flex items-center justify-between">
                            <p>{feature.description}</p>
                            <p className="text-sm italic font-semibold">
                                Requires {feature.required_credits} credits
                            </p>
                        </div>

                        {children}
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}


// import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
// import React from 'react'
// import { Head, Link, usePage } from '@inertiajs/react'

// const Feature = ({ feature, answer, children }) => {
//     const { auth } = usePage().props;

//     const availableCredits = auth?.user?.available_credits || 0;

//     return (
//         <AuthenticatedLayout user={auth.user}>
//             <Head title={feature.title} />

//             <div className="py-12">
//                 <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
//                     {answer !== null && (
//                         <div className="p-6 bg-white border-b border-gray-200">
//                             <h2 className="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
//                                 Result of Calculation: {answer}
//                             </h2>
//                         </div>
//                     )}

//                     <div className="p-6 bg-white border-b border-gray-200">
//                         {availableCredits < feature.required_credits && (
//                             <div className="relative">
//                                 <div className="absolute left-0 top-0 right-0 bottom-0 z-20 flex flex-col items-center justify-center bg-white/70 gap-3 text-red-500">
//                                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" className="w-6 h-6">
//                                         <path strokeLinecap="round" strokeLinejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
//                                     </svg>
//                                     <p>You do not have enough credits to use this feature.</p>
//                                     <Link href="/" className="text-blue-500 underline">Buy More Credits</Link>
//                                 </div>
//                             </div>
//                         )}

//                         <div className="p-8 text-gray-400 border-b pb-4">
//                             <p className="text-lg font-semibold text-gray-800 dark:text-gray-200 leading-tight">
//                                 Requires {feature.required_credits} credits
//                             </p>
//                         </div>
//                         {children}
//                     </div>
//                 </div>
//             </div>
//         </AuthenticatedLayout>
//     )
// }

// export default Feature;
