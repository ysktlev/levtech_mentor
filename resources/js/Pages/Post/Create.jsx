import React from "react";
import { Link, useForm } from '@inertiajs/react';
import Authenticated from "@/Layouts/AuthenticatedLayout";

const Create = (props) => {
    const {data, setData, post} = useForm({
        title: "",
        body: ""
    })

    const handleSendPosts = (e) => {
        e.preventDefault();
        post("/posts");
    }

    return (
            <Authenticated user={props.auth.user} header={
                    <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                        Create
                    </h2>
                }>

                <div className="p-12">

                    <form onSubmit={handleSendPosts}>
                        <div>
                            <h2>Title</h2>
                            <input type="text" placeholder="タイトル" onChange={(e) => setData("title", e.target.value)}/>
                            <span className="text-red-600">{props.errors.title}</span>
                        </div>                    

                        <div>
                            <h2>Body</h2>
                            <textarea placeholder="今日も1日お疲れさまでした。" onChange={(e) => setData("body", e.target.value)}></textarea>
                            <span className="text-red-600">{props.errors.body}</span>
                        </div>

                        <button type="submit" className="p-1 bg-purple-300 hover:bg-purple-400 rounded-md">send</button>
                    </form>

                    <Link href="/posts">戻る</Link>
                </div>

            </Authenticated>
            );
    }

export default Create;