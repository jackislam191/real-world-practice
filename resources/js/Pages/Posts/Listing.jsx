import React from 'react';
import { Inertia } from "@inertiajs/inertia";

const Listing = (props) => {
    // console.log(props.posts[0]);
    const posts = props.posts[0];
    return (

        <div>
            <h1>Posts in listing </h1>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Created by</th>
                </tr>
                <tr>
                    <td>{posts.title}</td>
                    <td>{posts.created_at}</td>
                    <td>{posts.updated_at}</td>
                    <td>{posts.user_id}</td>
                </tr>
            </table>


        </div>
// Should use map function for returning listing and jsx..
    )
}

export default Listing;
