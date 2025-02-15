// import React from 'react'
// import InputError from '@/Components/InputError'
// import InputLabel from '@/Components/InputLabel'
// import TextInput from '@/Components/TextInput'
// import PrimaryButton from '@/Components/PrimaryButton'
// import { useForm } from '@inertiajs/react'
// import Feature from '@/Components/Feature'

// export default function Index({ feature, answer }){
//     const { data, setData, post, reset, errors, processing } = useForm({
//         number1: "",
//         number2: "",
//     });

//     const handleSubmit = (e) => {
//         e.preventDefault();
//         post(route('feature1.calculate'), {
//             onSuccess: () => reset(),
//         });
//     };

//     return (
//         <Feature feature={feature} answer={answer}>
//             <form onSubmit={handleSubmit} className="p-8 grid grid-cols-2 gap-3">
//                 <div>
//                     <InputLabel htmlFor="number1" value="Number 1" />
//                     <TextInput
//                         id="number1"
//                         type="text"
//                         name="number1"
//                         value={data.number1}
//                         onChange={(e) => setData('number1', e.target.value)}
//                     />
//                     <InputError message={errors.number1} />
//                 </div>

//                 <div>
//                     <InputLabel htmlFor="number2" value="Number 2" />
//                     <TextInput
//                         id="number2"
//                         type="text"
//                         name="number2"
//                         value={data.number2}
//                         onChange={(e) => setData('number2', e.target.value)}
//                     />
//                     <InputError message={errors.number2} />
//                 </div>

//                 <PrimaryButton processing={processing}>Calculate</PrimaryButton>
//             </form>
//         </Feature>
//     );
// };


import React from "react";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import TextInput from "@/Components/TextInput";
import PrimaryButton from "@/Components/PrimaryButton";
import { useForm } from "@inertiajs/react";
import Feature from "@/Components/Feature";

export default function Index({ feature, answer }) {
    const { data, setData, post, reset, errors, processing } = useForm({
        number1: "",
        number2: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post(route("feature1.calculate"), {
            onSuccess: () => reset(),
        });
    };

    return (
        <Feature feature={feature} answer={answer}>
            <form onSubmit={handleSubmit} className="p-8 grid grid-cols-2 gap-3">
                <div>
                    <InputLabel htmlFor="number1" value="Number 1" />
                    <TextInput
                        id="number1"
                        type="text"
                        name="number1"
                        value={data.number1}
                        onChange={(e) => setData("number1", e.target.value)}
                    />
                    <InputError message={errors.number1 || ""} />
                </div>

                <div>
                    <InputLabel htmlFor="number2" value="Number 2" />
                    <TextInput
                        id="number2"
                        type="text"
                        name="number2"
                        value={data.number2}
                        onChange={(e) => setData("number2", e.target.value)}
                    />
                    <InputError message={errors.number2 || ""} />
                </div>

                <PrimaryButton disabled={processing}>Calculate</PrimaryButton>
            </form>
        </Feature>
    );
}
