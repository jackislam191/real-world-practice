import React from "react";

const View = (props) => {
    let postData = props.post[0];
    return (
        <div>
            <h1>Title: {postData.title}</h1>
            <p>Content: {postData.content}</p>
        </div>
    )
}

export default View;
