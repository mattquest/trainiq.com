import React from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';

export default function Movements(props) {
    console.log(props);
    console.log('hetherre');
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Movements</h2>}
        >
            <Head title="Movements" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        { props.movements.map((movement, i) => (
                        <div key={i} className="p-6 bg-white border-b border-gray-200">{movement.name}</div>
                        ))}
                    </div>
                </div>
            </div>
        </Authenticated>
    );
}
