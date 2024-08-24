<style>
                .review-section {
                    background-color: #f7f7f7;
                    padding: 20px;
                    width: 100%;

                }

                .review {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
                    max-width: 100%;
                    margin: 0 auto;
                }

                .review-header {
                    display: flex;
                    align-items: center;
                }

                .review-header img {
                    border-radius: 50%;
                    width: 50px;
                    height: 50px;
                    margin-right: 10px;
                }

                .review-header .user-name {
                    font-weight: bold;
                    font-size: 16px;
                }

                .review-header .review-date {
                    color: #777;
                    font-size: 14px;
                }

                .review-header .star-rating {
                    color: #f39c12;
                    margin-left: auto;
                    font-size: 18px;
                    display: flex;
                    align-items: center;
                }

                .review-content {
                    margin-top: 15px;
                    font-size: 16px;
                    color: #333;
                }

                .review-actions {
                    margin-top: 15px;
                    display: flex;
                    align-items: center;
                }

                .review-actions button {
                    background-color: #f4f4f4;
                    border: 1px solid #ddd;
                    padding: 5px 10px;
                    border-radius: 4px;
                    margin-right: 10px;
                    display: flex;
                    align-items: center;
                    cursor: pointer;
                }

                .review-actions button:hover {
                    background-color: #ddd;
                }

                .review-actions button i {
                    margin-right: 5px;
                }

                .review-actions .vote-count {
                    font-size: 14px;
                    color: #555;
                }
         
           .rating-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            max-width: 100%;
            margin: 0 auto;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            align-items: flex-start;
        }

        .user-rating {
            /* width: 35%; */
            text-align: center;
        }

        .user-rating .stars {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .user-rating .stars i {
            font-size: 25px;
            color: #f39c12;
            margin: 0 3px;
        }

        .user-rating .rating-text {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
        }

        .user-rating .update-review {
            background-color: #fff;
            color: #007bff;
            border: 1px solid #007bff;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .user-rating .update-review:hover {
            background-color: #007bff;
            color: #fff;
        }

        .overall-rating {
            /* width: 30%; */
            text-align: center;
            font-size: 40px;
            color: #333;
        }

        .overall-rating .star-rating {
            color: #f39c12;
            font-size: 30px;
            margin-bottom: 5px;
        }

        .overall-rating .rating-count {
            font-size: 16px;
            color: #777;
        }

        .rating-distribution {
            /* width: 30%; */
        }

        .rating-distribution .rating-bar {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .rating-distribution .rating-bar .star-text {
            color: #f39c12;
            font-size: 18px;
            margin-right: 10px;
        }

        .rating-distribution .rating-bar .bar {
            flex-grow: 1;
            height: 10px;
            background-color: #ddd;
            border-radius: 5px;
            position: relative;
        }

        .rating-distribution .rating-bar .bar span {
            height: 100%;
            background-color: #f39c12;
            border-radius: 5px;
            display: block;
            position: absolute;
            top: 0;
            left: 0;
        }

        .rating-distribution .rating-bar .count {
            margin-left: 10px;
            font-size: 14px;
            color: #777;
        }

        /* Modal Textarea */

        .styled-textarea {
            width: 100%;
            height: 100px;
            padding: 15px;
            font-size: 16px;
            line-height: 1.5;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            font-family: Arial, sans-serif;
            resize: none;
        }

        .styled-textarea:focus {
            border-color: #007bff;
            box-shadow: inset 0 1px 3px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        .styled-textarea::placeholder {
            color: #999;
        }
            </style>
