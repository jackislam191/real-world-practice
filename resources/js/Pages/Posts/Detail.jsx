import React from 'react';
import { Inertia } from "@inertiajs/inertia";

const Detail = (props) => {
    // console.log(props);
    const post = props.post[0];
    return (
        <div>
            <h1>{post.title}</h1>

            <br/>
            <p>{post.content}</p>
        </div>
    )
}

export default Detail;
