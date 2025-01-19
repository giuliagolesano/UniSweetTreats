<form action="#" method="POST">
                <ul>
                    <li>
                        <label for="review">Review:</label> 
                        <textarea id="review" name="review" rows="5" cols="50">Write here your review...</textarea>
                    </li>
                    <li>
                        <label for="rating">Rate product from 0 to 5: </label>
                        <input type="number" id="rating" name="rating" min="0" max="5" required />
                    </li>
                </ul>        
                <div>
                    <label for="submit">Submit</label>
                    <input type="submit" id="submit" name="submit" value="Send" />
                    <label for="reset">Reset</label>
                    <input type="reset" id="reset" name="reset" value="Cancel" />
                </div>   
            </form>