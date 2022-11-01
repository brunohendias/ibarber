import axios from "axios";
import { links } from '@/core/config';
import { gettoken } from '@/core/auth';

axios.defaults.baseURL = links.api
axios.defaults.headers.common['Authorization'] = gettoken()
axios.defaults.headers.common['Content-type'] = 'application/json'

export default axios.create({});